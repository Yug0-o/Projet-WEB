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

//console.log(strtolower($_SERVER['HTTP_X_REQUESTED_WITH']));

// Vérification si la requête est une requête Ajax
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupération des données envoyées par la requête Ajax
    $data = json_decode(file_get_contents("php://input"));

    // Vérification des données du formulaire de connexion
    $email = $data->email;
    $password = $data->password;

    // Requête SQL pour vérifier l'existence de l'utilisateur dans la base de données
    $sql = "SELECT *, promotions.promotion_name FROM account
            LEFT JOIN promotions ON account.promotion_id = promotions.id_promotion
            LEFT JOIN student_applied_for ON account.id_account = student_applied_for.account_id
            LEFT JOIN students_has_wish_listed ON account.id_account = students_has_wish_listed.account_id_account
            WHERE email = :email AND password = :password";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if ($result) {
        // L'utilisateur existe dans la base de données, renvoyez un code de statut 200 (OK)
        http_response_code(200);
        // Renvoyer les informations de l'utilisateur en tant que réponse JSON
        echo json_encode($result);
    } else {
        // L'utilisateur n'existe pas dans la base de données, renvoyez un code de statut 401 (Unauthorized)
        http_response_code(401);
        echo json_encode(array("error" => "Invalid credentials")); // Envoyer un message d'erreur JSON
    }
} else {
    // Si la requête n'est pas une requête Ajax, renvoyez un code de statut 405 (Method Not Allowed)
    http_response_code(405);
    echo json_encode(array("error" => "Method Not Allowed")); // Envoyer un message d'erreur JSON
}

$dbh = null;
?>

