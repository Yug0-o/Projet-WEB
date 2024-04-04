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

// Check if required data has been sent
if (isset($_POST['title']) && isset($_POST['offer_date']) && isset($_POST['available_places']) && isset($_POST['duration']) && isset($_POST['description']) && isset($_POST['company_id'])) {
    // Retrieve data sent by AJAX request
    $title = $_POST['title'];
    $offer_date = $_POST['offer_date'];
    $available_places = $_POST['available_places'];
    $duration = $_POST['duration'];
    $description = $_POST['description'];
    $company_id = $_POST['company_id'];
    $id_skill = $_POST['id_skill'];

    // Insert data into the internship table
    $stmt = $dbh->prepare("INSERT INTO internship (title, offer_date, available_places, duration, description, company_id)
                           VALUES (:title, :offer_date, :available_places, :duration, :description, :company_id)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':offer_date', $offerDate);
    $stmt->bindParam(':available_places', $availablePlaces);
    $stmt->bindParam(':duration', $duration);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':company_id', $company_id);
    $stmt->execute();

    // Get the ID of the newly inserted internship
    $newInternshipId = $dbh->lastInsertId();

    // Insert associated skills for the new internship into the internship_need_skill table
    $stmt = $dbh->prepare("INSERT INTO internship_need_skill (internship_id, skill_id)
                            VALUES (:internship_id, :skill_id)");
    $stmt->bindParam(':internship_id', $newInternshipId);
    $stmt->bindParam(':skill_id', $id_skill);
    $stmt->execute();

    echo "Data inserted successfully!";
} else {
    echo "Please provide all necessary information.";
}
?>
