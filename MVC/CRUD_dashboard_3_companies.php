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

// Check if the company name has been sent
if (isset($_POST['company_name'])) {
    // Retrieve the company name sent by the AJAX request
    $companyName = $_POST['company_name'];

    // Get the company ID corresponding to the name
    $stmt = $dbh->prepare("SELECT id_company FROM companies WHERE company_name = :company_name");
    $stmt->bindParam(':company_name', $companyName);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $companyId = $result['id_company'];

        // Delete data from the companies_has_locations table
        $stmt = $dbh->prepare("DELETE FROM companies_has_locations WHERE id_company = :company_id");
        $stmt->bindParam(':company_id', $companyId);
        $stmt->execute();

        // Delete data from the companies table
        $stmt = $dbh->prepare("DELETE FROM companies WHERE id_company = :company_id");
        $stmt->bindParam(':company_id', $companyId);
        $stmt->execute();

        echo "Company deleted successfully!";
    } else {
        echo "The company with the provided name does not exist.";
    }
} else {
    echo "Please provide the company name.";
}
?>
