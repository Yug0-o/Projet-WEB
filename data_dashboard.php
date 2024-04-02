<?php
try {
    $user = 'root';
    $pass = '';
    $dbh = new PDO('mysql:host=localhost;dbname=projetweb', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException) {
    // En cas d'échec de la connexion, renvoyer une réponse avec un code d'erreur
    http_response_code(500);
    echo json_encode(array("error" => "Connection failed"));
    die();
}

// Requête SQL pour récupérer les compétences et le nombre associé
$sql = "
    SELECT s.skill_name, COUNT(*) AS count
    FROM account_has_skill ahs
    JOIN skills s ON ahs.id_skill = s.id_skill
    GROUP BY s.skill_name
";

// Préparation de la requête
$stmt = $dbh->prepare($sql);

// Exécution de la requête
$stmt->execute();

// Récupération des données
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Envoi des données au format JSON
header('Content-Type: application/json');
echo json_encode($data);

// Fermeture de la connexion
$dbh = null;
?>
