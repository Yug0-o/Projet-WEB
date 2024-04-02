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

// Vérification si la requête est une requête Ajax
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    // Récupération des données envoyées par la requête Ajax
    $data = json_decode(file_get_contents("php://input"));

    // Vérification des données du formulaire de connexion
    $email = $data->email;
    $password = $data->password;

    // Requête SQL pour vérifier l'existence de l'utilisateur dans la base de données
    $sql = "SELECT * FROM account WHERE email = :email AND password = :password";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        // L'utilisateur existe dans la base de données, renvoyez un code de statut 200 (OK)
        http_response_code(200);
    } else {
        // L'utilisateur n'existe pas dans la base de données, renvoyez un code de statut 401 (Unauthorized)
        http_response_code(401);
    }
} else {
    // Si la requête n'est pas une requête Ajax, renvoyez un code de statut 405 (Method Not Allowed)
    http_response_code(405);
}

$dbh = null;
?>
