<?php
try {
    $user = 'root';
    $pass = '';
    $dbh = new PDO('mysql:host=localhost;dbname=projetweb', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException) {
    // If connection fails, send a response with an error code
    http_response_code(500);
    echo json_encode(array("error" => "Connection failed"));
    die();
}

// Check if necessary data has been sent
if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['password'])) {
    // Retrieve data sent by the AJAX request
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $roleId = $_POST['role_id'];
    $promotionId = $_POST['promotion_id'];
    $centerId = isset($_POST['center_id']) ? $_POST['center_id'] : null;

    // Check if the user already exists in the database
    $stmt = $dbh->prepare("SELECT * FROM account WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

    // If the user exists, execute an update query, otherwise execute an insert query
    if ($existingUser) {
        $sql = "UPDATE account 
                SET first_name = :first_name, last_name = :last_name, password = :password, 
                    role_id = :role_id, promotion_id = :promotion_id, center_id = :center_id
                WHERE email = :email";
    } else {
        $sql = "INSERT INTO account (first_name, last_name, email, password, role_id, promotion_id, center_id)
                VALUES (:first_name, :last_name, :email, :password, :role_id, :promotion_id, :center_id)";
    }

    // Execute the appropriate query
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':first_name', $firstName);
    $stmt->bindParam(':last_name', $lastName);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':role_id', $roleId);
    $stmt->bindParam(':promotion_id', $promotionId);
    $stmt->bindParam(':center_id', $centerId);

    if ($stmt->execute()) {
        echo "Data inserted/updated successfully!";
    } else {
        echo "Error inserting/updating data.";
    }
} else {
    echo "Please provide all necessary information.";
}
?>
