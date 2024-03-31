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

// Requête SQL pour récupérer les données des offres de stage avec des informations supplémentaires
$sql = "SELECT *
        FROM internship 
        JOIN locations ON internship.location_id = locations.id_locations
        JOIN companies ON internship.company_id = companies.id_company;";

// Utilisation de PDO pour exécuter la requête
$stmt = $dbh->query($sql);
$jobData = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Convertir le tableau en format JSON et l'afficher
header('Content-Type: application/json');
echo json_encode($jobData);
?>
