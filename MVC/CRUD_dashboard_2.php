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
if (isset($_POST['action'])) {
    $action = $_POST['action'];

    // If the action is "delete", delete the account
    if ($action === 'delete') {
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            deleteAccount($dbh, $email);
        } else {
            echo "Please provide the email address to delete the account.";
        }
    } 
    // If the action is "removeDuplicates", remove duplicates
    elseif ($action === 'removeDuplicates') {
        removeDuplicateAccounts($dbh);
    } else {
        echo "Invalid action.";
    }
} else {
    echo "Please provide an action.";
}

// Function to delete account based on email
function deleteAccount($dbh, $email) {
    $sql = "DELETE FROM account WHERE email = :email";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':email', $email);
    if ($stmt->execute()) {
        echo "Account deleted successfully!";
    } else {
        echo "Error deleting account.";
    }
}

// Function to remove duplicates from the "account" table
function removeDuplicateAccounts($dbh) {
    $sql = "DELETE a1 FROM account a1 JOIN account a2 
            WHERE a1.id_account < a2.id_account AND a1.email = a2.email";
    $stmt = $dbh->prepare($sql);
    if ($stmt->execute()) {
        echo "Duplicates removed successfully!";
    } else {
        echo "Error removing duplicates.";
    }
}
?>
