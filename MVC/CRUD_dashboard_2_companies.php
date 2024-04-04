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

    // Update data in the companies table
    $stmt = $dbh->prepare("UPDATE companies 
                           SET sector = :sector, 
                               student_visible = :student_visible
                           WHERE company_name = :company_name");
    $stmt->bindParam(':sector', $sector);
    $stmt->bindParam(':student_visible', $studentVisible);
    $stmt->bindParam(':company_name', $companyName);
    $stmt->execute();

    // Update data in the locations table based on the company name
    $stmt = $dbh->prepare("UPDATE locations 
                           SET address = :address, 
                               country_id = :country_id
                           WHERE id_locations IN (
                               SELECT id_locations
                               FROM companies_has_locations
                               WHERE id_company = (
                                   SELECT id_company
                                   FROM companies
                                   WHERE company_name = :company_name
                               )
                           )");
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':country_id', $countryId);
    $stmt->bindParam(':company_name', $companyName);
    $stmt->execute();

    echo "Data updated successfully!";
} else {
    echo "Please provide all necessary information.";
}
?>
