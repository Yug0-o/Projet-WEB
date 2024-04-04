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

// Vérifier si les données nécessaires ont été envoyées
if (isset($_POST['company_name'], $_POST['sector'], $_POST['student_visible'], $_POST['address'], $_POST['country_id'])) {
    // Récupérer les données envoyées par la requête AJAX
    $companyName = $_POST['company_name'];
    $sector = $_POST['sector'];
    $studentVisible = $_POST['student_visible'];
    $address = $_POST['address'];
    $countryId = $_POST['country_id'];

    // Insertion des données dans la table companies
    $stmt = $dbh->prepare("INSERT INTO companies (company_name, sector, student_visible)
                           VALUES (:company_name, :sector, :student_visible)");
    $stmt->bindParam(':company_name', $companyName);
    $stmt->bindParam(':sector', $sector);
    $stmt->bindParam(':student_visible', $studentVisible);
    $stmt->execute();

    // Récupération de l'ID de la dernière entreprise insérée
    $idCompany = $dbh->lastInsertId();

    // Insertion des données dans la table locations
    $stmt = $dbh->prepare("INSERT INTO locations (address, country_id)
                           VALUES (:address, :country_id)");
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':country_id', $countryId);
    $stmt->execute();

    // Récupération de l'ID de la dernière localisation insérée
    $idLocation = $dbh->lastInsertId();

    // Insertion des données dans la table companies_has_locations
    $stmt = $dbh->prepare("INSERT INTO companies_has_locations (id_company, id_locations)
                           VALUES (:id_company, :id_locations)");
    $stmt->bindParam(':id_company', $idCompany);
    $stmt->bindParam(':id_locations', $idLocation);
    $stmt->execute();

    echo "Données insérées avec succès !";
} else {
    echo "Veuillez fournir toutes les informations nécessaires.";
}
?>
