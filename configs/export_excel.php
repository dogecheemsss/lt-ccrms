<?php
include 'config.php';

$startYear = isset($_GET['startYear']) ? (int)$_GET['startYear'] : 0;
$startMonth = isset($_GET['startMonth']) ? (int)$_GET['startMonth'] : 0;
$endYear = isset($_GET['endYear']) ? (int)$_GET['endYear'] : 0;
$endMonth = isset($_GET['endMonth']) ? (int)$_GET['endMonth'] : 0;
$nature = isset($_GET['nature']) ? $_GET['nature'] : '';

// Set headers for Excel download
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="detailed_cases_report.xls"');

// SQL Query
$sql = "SELECT 
    c.case_no,
    GROUP_CONCAT(DISTINCT CONCAT(p1.first_name, ' ', COALESCE(p1.middle_name, ''), ' ', p1.last_name, ' ', COALESCE(p1.suffix, '')) SEPARATOR ' & ') AS complainants,
    GROUP_CONCAT(DISTINCT CONCAT(p2.first_name, ' ', COALESCE(p2.middle_name, ''), ' ', p2.last_name, ' ', COALESCE(p2.suffix, '')) SEPARATOR ' & ') AS respondents,
    c.title,
    c.nature,
    DATE_FORMAT(c.file_date, '%Y-%m-%d') as file_date,
    DATE_FORMAT(c.confrontation_date, '%Y-%m-%d') as confrontation_date,
    c.action_taken,
    DATE_FORMAT(c.settlement_date, '%Y-%m-%d') as settlement_date,
    DATE_FORMAT(c.exec_settlement_date, '%Y-%m-%d') as exec_settlement_date,
    c.main_agreement,
    c.compliance_status,
    c.remarks
FROM cases c
LEFT JOIN case_persons cp1 ON c.case_no = cp1.case_no AND cp1.role = 'Complainant'
LEFT JOIN persons p1 ON cp1.person_id = p1.person_id
LEFT JOIN case_persons cp2 ON c.case_no = cp2.case_no AND cp2.role = 'Respondent'
LEFT JOIN persons p2 ON cp2.person_id = p2.person_id
WHERE c.is_archived = 0";

// Apply date range filter
if ($startYear && $startMonth && $endYear && $endMonth) {
    $startDate = "$startYear-" . str_pad($startMonth, 2, '0', STR_PAD_LEFT) . "-01";
    $endDate = date("Y-m-t", strtotime("$endYear-" . str_pad($endMonth, 2, '0', STR_PAD_LEFT) . "-01"));
    $sql .= " AND c.file_date BETWEEN '$startDate' AND '$endDate'";
}

// Apply nature filter
if (!empty($nature)) {
    $sql .= " AND c.nature = '" . $conn->real_escape_string($nature) . "'";
}

$sql .= " GROUP BY c.case_no, c.title, c.nature, c.file_date ORDER BY c.file_date ASC";

// Execute and generate table
$result = $conn->query($sql);

echo "<table border='1'>";
echo "<tr style='background-color: #db8505; color: white; font-weight: bold;'>
        <td>Case No</td>
        <td>Complainant(s)</td>
        <td>Respondent(s)</td>
        <td>Title</td>
        <td>Nature</td>
        <td>Date Filed</td>
        <td>Confrontation Date</td>
        <td>Action Taken</td>
        <td>Settlement Date</td>
        <td>Execution Date</td>
        <td>Agreement</td>
        <td>Status</td>
        <td>Remarks</td>
      </tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['case_no']) . "</td>";
    echo "<td>" . htmlspecialchars($row['complainants']) . "</td>";
    echo "<td>" . htmlspecialchars($row['respondents']) . "</td>";
    echo "<td>" . htmlspecialchars($row['title']) . "</td>";
    echo "<td>" . htmlspecialchars($row['nature']) . "</td>";
    echo "<td>" . htmlspecialchars($row['file_date']) . "</td>";
    echo "<td>" . htmlspecialchars($row['confrontation_date']) . "</td>";
    echo "<td>" . htmlspecialchars($row['action_taken']) . "</td>";
    echo "<td>" . htmlspecialchars($row['settlement_date']) . "</td>";
    echo "<td>" . htmlspecialchars($row['exec_settlement_date']) . "</td>";
    echo "<td>" . htmlspecialchars($row['main_agreement']) . "</td>";
    echo "<td>" . htmlspecialchars($row['compliance_status']) . "</td>";
    echo "<td>" . htmlspecialchars($row['remarks']) . "</td>";
    echo "</tr>";
}

echo "</table>";

$conn->close();
?>
