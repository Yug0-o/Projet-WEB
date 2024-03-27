<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur ma page !</title>
</head>

<body>
    <h1>Bienvenue !</h1>
    <?php
    // Vérifier si le formulaire a été soumis
    if (isset($_POST['nom'])) {
      $nom = $_POST['nom'];
      echo "<p>Bonjour, $nom !</p>";
    } else {
      // Formulaire pour saisir le nom
      echo "<form method='post'>
              <label for='nom'>Entrez votre nom :</label>
              <input type='text' id='nom' name='nom' required>
              <button type='submit'>Envoyer</button>
            </form>";
    }
  ?>
</body>

</html>