<?php
try {
    $user = 'root';
    $pass = '';
    $dbh = new PDO('mysql:host=localhost;dbname=projetweb', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException) {
    echo "Connection failed: An error occurred while processing the request.";
    die();
}

// SQL query to retrieve internship job data with additional information
$sql = "SELECT *
        FROM internship 
        JOIN companies ON internship.company_id = companies.id_company
        JOIN companies_has_locations ON companies.id_company = companies_has_locations.id_company
        JOIN locations ON companies_has_locations.id_locations = locations.id_locations;";

// Use PDO to execute the query
$stmt = $dbh->query($sql);
$jobData = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Convert the array to JSON format and display it
header('Content-Type: application/json');
echo json_encode($jobData);
?>
