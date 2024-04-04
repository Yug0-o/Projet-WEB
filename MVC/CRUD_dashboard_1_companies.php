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
if (isset($_POST['company_name'], $_POST['sector'], $_POST['student_visible'], $_POST['address'], $_POST['country_id'])) {
    // Retrieve data sent by the AJAX request
    $companyName = $_POST['company_name'];
    $sector = $_POST['sector'];
    $studentVisible = $_POST['student_visible'];
    $address = $_POST['address'];
    $countryId = $_POST['country_id'];

    // Insert data into the companies table
    $stmt = $dbh->prepare("INSERT INTO companies (company_name, sector, student_visible)
                           VALUES (:company_name, :sector, :student_visible)");
    $stmt->bindParam(':company_name', $companyName);
    $stmt->bindParam(':sector', $sector);
    $stmt->bindParam(':student_visible', $studentVisible);
    $stmt->execute();

    // Get the ID of the last inserted company
    $idCompany = $dbh->lastInsertId();

    // Insert data into the locations table
    $stmt = $dbh->prepare("INSERT INTO locations (address, country_id)
                           VALUES (:address, :country_id)");
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':country_id', $countryId);
    $stmt->execute();

    // Get the ID of the last inserted location
    $idLocation = $dbh->lastInsertId();

    // Insert data into the companies_has_locations table
    $stmt = $dbh->prepare("INSERT INTO companies_has_locations (id_company, id_locations)
                           VALUES (:id_company, :id_locations)");
    $stmt->bindParam(':id_company', $idCompany);
    $stmt->bindParam(':id_locations', $idLocation);
    $stmt->execute();

    echo "Data inserted successfully!";
} else {
    echo "Please provide all necessary information.";
}
?>
