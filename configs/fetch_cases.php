<?php
include 'config.php';

// Get the current date
$currentDate = new DateTime();

// Default: Set the last 12 months
$endYear = $currentDate->format('Y');
$endMonth = $currentDate->format('m');

// Calculate the start date (12 months ago)
$startDate = clone $currentDate;
$startDate->modify('-12 months');
$startYear = $startDate->format('Y');
$startMonth = $startDate->format('m');

// Override with query parameters if provided
$startYear = isset($_GET['startYear']) ? (int)$_GET['startYear'] : $startYear;
$startMonth = isset($_GET['startMonth']) ? (int)$_GET['startMonth'] : $startMonth;
$endYear = isset($_GET['endYear']) ? (int)$_GET['endYear'] : $endYear;
$endMonth = isset($_GET['endMonth']) ? (int)$_GET['endMonth'] : $endMonth;

// Build dynamic WHERE clause for filtering
$whereClause = "is_archived = 0";
$params = [];
$types = "";

// Filter by year and month range (startYear/startMonth to endYear/endMonth)
if ($startYear && $startMonth && $endYear && $endMonth) {
    $whereClause .= " AND ((YEAR(file_date) > ? OR (YEAR(file_date) = ? AND MONTH(file_date) >= ?)) ";
    $whereClause .= "AND (YEAR(file_date) < ? OR (YEAR(file_date) = ? AND MONTH(file_date) <= ?)))";
    $params[] = $startYear;
    $params[] = $startYear;
    $params[] = $startMonth;
    $params[] = $endYear;
    $params[] = $endYear;
    $params[] = $endMonth;
    $types .= "iiiiii";  // Add six integers for year/month range
}

// Helper function to prepare and execute dynamic queries
function fetchSingleValue($conn, $query, $types, $params) {
    $stmt = $conn->prepare($query);
    if ($types && $params) {
        $stmt->bind_param($types, ...$params);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    $value = $result->fetch_assoc();
    $stmt->close();
    return $value;
}

// Total cases
$totalCasesData = fetchSingleValue($conn, "SELECT COUNT(*) AS total FROM cases WHERE $whereClause", $types, $params);
$totalCases = $totalCasesData['total'] ?? 0;

// Criminal cases
$criminalCasesData = fetchSingleValue($conn, "SELECT COUNT(*) AS total FROM cases WHERE nature = 'Criminal' AND $whereClause", $types, $params);
$criminalCases = $criminalCasesData['total'] ?? 0;

// Civil cases
$civilCasesData = fetchSingleValue($conn, "SELECT COUNT(*) AS total FROM cases WHERE nature = 'Civil' AND $whereClause", $types, $params);
$civilCases = $civilCasesData['total'] ?? 0;

// Monthly case counts (filtered by year/month range)
$monthlyCasesQuery = "
    SELECT 
        DATE_FORMAT(file_date, '%Y-%m') AS month,
        SUM(CASE WHEN nature = 'Civil' THEN 1 ELSE 0 END) AS civil,
        SUM(CASE WHEN nature = 'Criminal' THEN 1 ELSE 0 END) AS criminal
    FROM cases
    WHERE $whereClause
    GROUP BY month
    ORDER BY month
";

$stmt = $conn->prepare($monthlyCasesQuery);
$stmt->bind_param($types, ...$params);  // Bind the dynamic parameters
$stmt->execute();
$monthlyCasesResult = $stmt->get_result();

$monthlyCases = [];
while ($row = $monthlyCasesResult->fetch_assoc()) {
    $monthKey = $row['month']; // e.g., "2024-03"
    $monthlyCases[$monthKey] = [
        'civil' => (int) $row['civil'],
        'criminal' => (int) $row['criminal']
    ];
}
$stmt->close();

// Yearly breakdown for chart (all data, not filtered by year/month)
$yearlyCasesQuery = "
    SELECT YEAR(file_date) AS year,
           SUM(CASE WHEN nature = 'Criminal' THEN 1 ELSE 0 END) AS criminal_cases,
           SUM(CASE WHEN nature = 'Civil' THEN 1 ELSE 0 END) AS civil_cases
    FROM cases
    GROUP BY YEAR(file_date)
    ORDER BY year ASC
";
$yearlyCasesResult = $conn->query($yearlyCasesQuery);
$yearlyCases = [];
while ($row = $yearlyCasesResult->fetch_assoc()) {
    $yearlyCases[$row['year']] = [
        'criminal' => (int) $row['criminal_cases'],
        'civil' => (int) $row['civil_cases']
    ];
}

// Status breakdown (Complete/Ongoing)
$statusStmt = $conn->prepare("SELECT compliance_status, COUNT(*) AS total FROM cases WHERE $whereClause GROUP BY compliance_status");
if ($types && $params) {
    $statusStmt->bind_param($types, ...$params);
}
$statusStmt->execute();
$statusResult = $statusStmt->get_result();

$statusData = ["Complete" => 0, "Ongoing" => 0];
while ($row = $statusResult->fetch_assoc()) {
    $statusData[$row['compliance_status']] = $row['total'];
}
$statusStmt->close();

// Return as JSON
echo json_encode([
    'total_cases' => $totalCases,
    'criminal_cases' => $criminalCases,
    'civil_cases' => $civilCases,
    'status_data' => $statusData,
    'yearly_cases' => $yearlyCases,
    'monthly_cases' => $monthlyCases
]);

$conn->close();
?>
