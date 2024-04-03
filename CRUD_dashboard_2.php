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

// Vérifier si les données nécessaires ont été envoyées
if (isset($_POST['action'])) {
    $action = $_POST['action'];

    // Si l'action est "delete", supprimer le compte
    if ($action === 'delete') {
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            deleteAccount($dbh, $email);
        } else {
            echo "Veuillez fournir l'adresse e-mail pour supprimer le compte.";
        }
    } 
    // Si l'action est "removeDuplicates", supprimer les doublons
    elseif ($action === 'removeDuplicates') {
        removeDuplicateAccounts($dbh);
    } else {
        echo "Action non valide.";
    }
} else {
    echo "Veuillez fournir une action.";
}

// Fonction pour supprimer le compte basé sur l'adresse e-mail
function deleteAccount($dbh, $email) {
    $sql = "DELETE FROM account WHERE email = :email";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':email', $email);
    if ($stmt->execute()) {
        echo "Compte supprimé avec succès !";
    } else {
        echo "Erreur lors de la suppression du compte.";
    }
}

// Fonction pour supprimer les doublons de la table "account"
function removeDuplicateAccounts($dbh) {
    $sql = "DELETE a1 FROM account a1 JOIN account a2 
            WHERE a1.id_account < a2.id_account AND a1.email = a2.email";
    $stmt = $dbh->prepare($sql);
    if ($stmt->execute()) {
        echo "Doublons supprimés avec succès !";
    } else {
        echo "Erreur lors de la suppression des doublons.";
    }
}
?>
