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

// SQL query to retrieve skills and their associated count
$sql = 'SELECT ins.internship_id, COUNT(*) AS count
        FROM account_has_skill ahs
        JOIN skills s ON ahs.id_skill = s.id_skill
        JOIN internship_need_skill ins ON s.id_skill = ins.skill_id
        GROUP BY s.skill_name';

// Prepare the query
$stmt = $dbh->prepare($sql);

// Execute the query
$stmt->execute();

// Fetch the data
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Send data in JSON format
header('Content-Type: application/json');
echo json_encode($data);

// Close the connection
$dbh = null;
?>
