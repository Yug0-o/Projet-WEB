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

// Check if all necessary data is present for UPDATE
if (isset($_POST['internship_id'])) {
    // Retrieve data sent by AJAX request
    $internship_id = $_POST['internship_id'];
    $title = $_POST['title'];
    $offerDate = $_POST['offer_date'];
    $availablePlaces = $_POST['available_places'];
    $duration = $_POST['duration'];
    $description = $_POST['description'];
    $company_id = $_POST['company_id'];

    // Update data in the internship table
    $stmt = $dbh->prepare("UPDATE internship
                           SET title = :title, offer_date = :offer_date, available_places = :available_places, duration = :duration, description = :description, company_id = :company_id
                           WHERE internship_id = :internship_id");
    $stmt->bindParam(':internship_id', $internship_id);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':offer_date', $offerDate);
    $stmt->bindParam(':available_places', $availablePlaces);
    $stmt->bindParam(':duration', $duration);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':company_id', $company_id);
    $stmt->execute();

    echo "Data updated successfully!";
} else {
    echo "Please provide all necessary information for UPDATE.";
}
?>
