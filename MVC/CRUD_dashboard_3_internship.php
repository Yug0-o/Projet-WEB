<?php
try {
    $user = 'root';
    $pass = '';
    $dbh = new PDO('mysql:host=localhost;dbname=projetweb', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // If connection fails, send a response with an error code
    http_response_code(500);
    echo json_encode(array("error" => "Connection failed"));
    die();
}

// Check if all necessary data is present for DELETE
if (isset($_POST['internship_id'])) {
    // Retrieve data sent by AJAX request
    $internship_id = $_POST['internship_id'];

    // Delete data in the internship table
    $stmt = $dbh->prepare("DELETE FROM internship_need_skill WHERE internship_id = :internship_id;
                            DELETE FROM internship WHERE id_internship = :internship_id;");
    $stmt->bindParam(':internship_id', $internship_id);
    $stmt->execute();

    echo "Data deleted successfully!";
} else {
    echo "Please provide the internship ID to delete.";
}
?>
