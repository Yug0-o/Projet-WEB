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
        JOIN locations ON internship.location_id = locations.id_locations
        JOIN companies ON internship.company_id = companies.id_company;";

// Use PDO to execute the query
$stmt = $dbh->query($sql);
$jobData = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Convert the array to JSON format and display it
header('Content-Type: application/json');
echo json_encode($jobData);
?>
