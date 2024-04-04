<?php
try {
    $user = 'root';
    $pass = '';
    $dbh = new PDO('mysql:host=localhost;dbname=projetweb', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // En cas d'échec de la connexion, renvoyer une réponse avec un code d'erreur
    http_response_code(500);
    echo json_encode(array("error" => "Connection failed"));
    die();
}

// Vérifier si toutes les données nécessaires sont présentes pour l'UPDATE
if (isset($_POST['internship_id'])) {
    // Récupérer les données envoyées par la requête AJAX
    $internship_id = $_POST['internship_id'];
    $title = $_POST['title'];
    $offerDate = $_POST['offer_date'];
    $availablePlaces = $_POST['available_places'];
    $duration = $_POST['duration'];
    $description = $_POST['description'];
    $company_id = $_POST['company_id'];

    // Update des données dans la table internship
    $stmt = $dbh->prepare("UPDATE internship
                           SET title = :title, offer_date = :offer_date, available_places = :available_places, duration = :duration, description = :description, company_id = :company_id
                           WHERE internship_id = :internship_id");
    $stmt->bindParam(':internship_id', $internship_id);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':offer_date', $offerDate);
    $stmt->bindParam(':available_places', $availablePlaces);
    $stmt->bindParam(':duration', $duration);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':company_id', $company_id);
    $stmt->execute();

    echo "Données mises à jour avec succès !";
} else {
    echo "Veuillez fournir toutes les informations nécessaires pour l'UPDATE.";
}
?>
