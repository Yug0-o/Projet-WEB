<?php
try {
    $user = 'root';
    $pass = '';
    $dbh = new PDO('mysql:host=localhost;dbname=projetweb', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException) {
    // En cas d'échec de la connexion, renvoyer une réponse avec un code d'erreur
    http_response_code(500);
    echo json_encode(array("error" => "Connection failed"));
    die();
}

// Vérifier si le nom de l'entreprise a été envoyé
if (isset($_POST['company_name'])) {
    // Récupérer le nom de l'entreprise envoyé par la requête AJAX
    $companyName = $_POST['company_name'];

    // Récupérer l'identifiant de l'entreprise correspondant au nom
    $stmt = $dbh->prepare("SELECT id_company FROM companies WHERE company_name = :company_name");
    $stmt->bindParam(':company_name', $companyName);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $companyId = $result['id_company'];

        // Suppression des données dans la table companies_has_locations
        $stmt = $dbh->prepare("DELETE FROM companies_has_locations WHERE id_company = :company_id");
        $stmt->bindParam(':company_id', $companyId);
        $stmt->execute();

        // Suppression des données dans la table companies
        $stmt = $dbh->prepare("DELETE FROM companies WHERE id_company = :company_id");
        $stmt->bindParam(':company_id', $companyId);
        $stmt->execute();

        echo "Entreprise supprimée avec succès !";
    } else {
        echo "L'entreprise avec le nom fourni n'existe pas.";
    }
} else {
    echo "Veuillez fournir le nom de l'entreprise.";
}
?>
