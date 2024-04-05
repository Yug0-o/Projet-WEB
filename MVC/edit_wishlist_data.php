<?php
try {
    $user = 'root';
    $pass = '';
    $dbh = new PDO('mysql:host=localhost;dbname=projetweb', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException) {
    http_response_code(500); // Internal Server Error
    echo json_encode(array("error" => "Connection failed: An error occurred while processing the request."));
    die();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    // file deepcode ignore XSS: test echo
    echo 'email : ' . $email;

    $wishlist = str_replace(array('[', ']', '"'), '', $_POST['wishlist']);
    $wishlisted = explode(',', $wishlist);
    $wishlisted = array_filter($wishlisted, function($value) {
        return $value !== 'null';
    });
    echo ' - wishlist : ';
    print_r($wishlisted);
    echo ' ';


    if ($wishlisted === null && json_last_error() !== JSON_ERROR_NONE) {
        http_response_code(400); // Bad Request
        echo "Invalid wishlist";
        die();
    }

    if (!is_array($wishlisted)) {
        http_response_code(400); // Bad Request
        echo "Wishlist is not an array. Type: ". gettype($wishlisted);
        die();
    }

    // SQL to get the account id from the email
    $sql = "SELECT id_account FROM account WHERE email = :email";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([':email' => $email]);
    $accountId = $stmt->fetchColumn();

    if (!$accountId) {
        http_response_code(400); // Bad Request
        echo "Account not found";
        die();
    }

    // SQL to insert the wishlisted id and account id into the students_has_wish_listed table
    $sql = "INSERT INTO students_has_wish_listed (id_internship, account_id_account) VALUES (:wishlisted, :accountId)";
    $stmt = $dbh->prepare($sql);

    echo '- accountId : ' . $accountId . ' ' . gettype($accountId);

    echo '- id_internship : ';

    foreach ($wishlisted as $id_internship) {
        $id_internship = (int)$id_internship;
        $accountId = (int)$accountId;

            echo $id_internship . ' ' . gettype($id_internship) . ' - ';


        $stmt->execute([':wishlisted' => $id_internship, ':accountId' => $accountId]);
    }


    echo "Successfully added to wishlist";
    http_response_code(200); // OK
}
?>