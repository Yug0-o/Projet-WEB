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
if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['password'])) {
    // Récupérer les données envoyées par la requête AJAX
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $roleId = isset($_POST['role_id']) ? $_POST['role_id'] : null;
    $promotionId = isset($_POST['promotion_id']) ? $_POST['promotion_id'] : null;
    $centerId = isset($_POST['center_id']) ? $_POST['center_id'] : null;

    // Vérifier si l'utilisateur existe déjà dans la base de données
    $stmt = $dbh->prepare("SELECT * FROM account WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

    // Si l'utilisateur existe, exécuter une requête de mise à jour, sinon exécuter une requête d'insertion
    if ($existingUser) {
        $sql = "UPDATE account 
                SET first_name = :first_name, last_name = :last_name, password = :password, 
                    role_id = :role_id, promotion_id = :promotion_id, center_id = :center_id
                WHERE email = :email";
    } else {
        $sql = "INSERT INTO account (first_name, last_name, email, password, role_id, promotion_id, center_id)
                VALUES (:first_name, :last_name, :email, :password, :role_id, :promotion_id, :center_id)";
    }

    // Exécuter la requête appropriée
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':first_name', $firstName);
    $stmt->bindParam(':last_name', $lastName);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':role_id', $roleId);
    $stmt->bindParam(':promotion_id', $promotionId);
    $stmt->bindParam(':center_id', $centerId);

    if ($stmt->execute()) {
        echo "Données insérées/mises à jour avec succès !";
    } else {
        echo "Erreur lors de l'insertion/mise à jour des données.";
    }
} else {
    echo "Veuillez fournir toutes les informations nécessaires.";
}
?>
