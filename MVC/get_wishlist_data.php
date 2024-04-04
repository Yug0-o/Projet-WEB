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

// Check if email is set in POST request
if (!isset($_POST['email'])) {
    echo "Email not provided";
    die();
}

$email = $_POST['email'];

// SQL query to retrieve internship job data with additional information
$sql = "SELECT internship.*, locations.*, companies.*
        FROM internship 
        JOIN locations ON internship.location_id = locations.id_locations
        JOIN companies ON internship.company_id = companies.id_company
        JOIN students_has_wish_listed ON internship.id_internship = students_has_wish_listed.id_internship
        JOIN account ON students_has_wish_listed.account_id_account WHERE students_has_wish_listed.account_id_account = (SELECT account.id_account WHERE account.email = :email);";

// Use PDO to execute the query
$stmt = $dbh->prepare($sql);
$stmt->execute([':email' => $email]);
$jobData = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Convert the array to JSON format and display it
header('Content-Type: application/json');
echo json_encode($jobData);
?>
