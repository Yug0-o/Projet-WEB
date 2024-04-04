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

// Vérifier si toutes les données nécessaires sont présentes pour le DELETE
if (isset($_POST['internship_id'])) {
    // Récupérer les données envoyées par la requête AJAX
    $internship_id = $_POST['internship_id'];

    // Suppression des données dans la table internship
    $stmt = $dbh->prepare("DELETE FROM internship_need_skill WHERE internship_id = :internship_id;
                            DELETE FROM internship WHERE id_internship = :internship_id;");
    $stmt->bindParam(':internship_id', $internship_id);
    $stmt->execute();

    echo "Données supprimées avec succès !";
} else {
    echo "Veuillez fournir l'ID du stage à supprimer.";
}
?>
