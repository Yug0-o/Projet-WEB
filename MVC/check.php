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

// Check if the request is an Ajax request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve data sent by the Ajax request
    $data = json_decode(file_get_contents("php://input"));

    // Check login form data
    $email = $data->email;
    $password = $data->password;

    // SQL query to check user existence in the database
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
        // User exists in the database, return status code 200 (OK)
        http_response_code(200);
        // Return user information as JSON response
        echo json_encode($result);
    } else {
        // User does not exist in the database, return status code 401 (Unauthorized)
        http_response_code(401);
        echo json_encode(array("error" => "Invalid credentials")); // Send JSON error message
    }
} else {
    // If the request is not an Ajax request, return status code 405 (Method Not Allowed)
    http_response_code(405);
    echo json_encode(array("error" => "Method Not Allowed")); // Send JSON error message
}

$dbh = null;
?>
