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

// Vérifier si les données nécessaires ont été envoyées
if (isset($_POST['title']) && isset($_POST['offer_date']) && isset($_POST['available_places']) && isset($_POST['duration']) && isset($_POST['description']) && isset($_POST['company_id'])) {
    // Récupérer les données envoyées par la requête AJAX
    $title = $_POST['title'];
    $offer_date = $_POST['offer_date'];
    $available_places = $_POST['available_places'];
    $duration = $_POST['duration'];
    $description = $_POST['description'];
    $company_id = $_POST['company_id'];
    $id_skill = $_POST['id_skill'];

    // Insertion des données dans la table internship
    $stmt = $dbh->prepare("INSERT INTO internship (title, offer_date, available_places, duration, description, company_id)
                           VALUES (:title, :offer_date, :available_places, :duration, :description, :company_id)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':offer_date', $offerDate);
    $stmt->bindParam(':available_places', $availablePlaces);
    $stmt->bindParam(':duration', $duration);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':company_id', $company_id);
    $stmt->execute();

    // Récupération de l'ID du nouveau stage inséré
    $newInternshipId = $dbh->lastInsertId();

    // Insertion des compétences associées au nouveau stage dans la table internship_need_skill
    $stmt = $dbh->prepare("INSERT INTO internship_need_skill (internship_id, skill_id)
                            VALUES (:internship_id, :skill_id)");
    $stmt->bindParam(':internship_id', $newInternshipId);
    $stmt->bindParam(':skill_id', $id_skill);
    $stmt->execute();

    echo "Données insérées avec succès !";
} else {
    echo "Veuillez fournir toutes les informations nécessaires.";
}
?>
