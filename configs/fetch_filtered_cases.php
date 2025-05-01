<?php
include 'config.php';

$startYear = isset($_GET['startYear']) ? (int)$_GET['startYear'] : 0;
$startMonth = isset($_GET['startMonth']) ? (int)$_GET['startMonth'] : 0;
$endYear = isset($_GET['endYear']) ? (int)$_GET['endYear'] : 0;
$endMonth = isset($_GET['endMonth']) ? (int)$_GET['endMonth'] : 0;
$nature = isset($_GET['nature']) ? $_GET['nature'] : '';

$sql = "SELECT 
    c.case_no,
    GROUP_CONCAT(DISTINCT CONCAT(p1.first_name, ' ', COALESCE(p1.middle_name, ''), ' ', p1.last_name, ' ', COALESCE(p1.suffix, ''), ' ') SEPARATOR ' & ') AS complainants,
    GROUP_CONCAT(DISTINCT CONCAT(p2.first_name, ' ', COALESCE(p2.middle_name, ''), ' ', p2.last_name, ' ', COALESCE(p2.suffix, ''), ' ') SEPARATOR ' & ') AS respondents,
    c.title,
    c.nature,
    DATE_FORMAT(c.file_date, '%Y-%m-%d') as file_date
FROM cases c
LEFT JOIN case_persons cp1 ON c.case_no = cp1.case_no AND cp1.role = 'Complainant'
LEFT JOIN persons p1 ON cp1.person_id = p1.person_id
LEFT JOIN case_persons cp2 ON c.case_no = cp2.case_no AND cp2.role = 'Respondent'
LEFT JOIN persons p2 ON cp2.person_id = p2.person_id";

// Filter by date range if all parts are present
if ($startYear && $startMonth && $endYear && $endMonth) {
    $startDate = "$startYear-" . str_pad($startMonth, 2, '0', STR_PAD_LEFT) . "-01";
    $endDate = date("Y-m-t", strtotime("$endYear-" . str_pad($endMonth, 2, '0', STR_PAD_LEFT) . "-01"));
    $sql .= " AND c.file_date BETWEEN '$startDate' AND '$endDate'";
}

// Filter by nature if provided
if (!empty($nature)) {
    $sql .= " AND c.nature = '" . $conn->real_escape_string($nature) . "'";
}

$sql .= " GROUP BY c.case_no, c.title, c.nature, c.file_date ORDER BY c.file_date ASC";

$result = $conn->query($sql);
$cases = [];

while ($row = $result->fetch_assoc()) {
    $cases[] = $row;
}

header('Content-Type: application/json');
echo json_encode($cases);
$conn->close();
?>