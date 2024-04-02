<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="My Web Page">
  <link rel="stylesheet" href="assets/dashboard.css">
  <title>My Web Page</title>
</head>
<body>
  <div class="container">
    <div class="flx1"> 
      <div class="nav-logo">
        <img src="/images/logo-classic.webp" alt="Logo" class="logo">
      </div>
      <div class="nav-items">
        <p id="nav-stats" onclick="showStats()">Affichage des statistiques</p>
        <p id="nav-comptes" onclick="showComptes()">Information comptes</p>
        <p id="nav-stages" onclick="showStages()">Information stages</p>
      </div>
      <div class="nav-items-bottom">
        <p onclick="showAccountInfo()">Information du compte</p>
        <p onclick="switchToStudentView()">Passage en vue étudiant</p>
        <p onclick="logout()">Déconnexion</p>
      </div>
    </div>
    <?php
      try {
          $user = 'root';
          $pass = '';
          $dbh = new PDO('mysql:host=localhost;dbname=projetweb', $user, $pass);
          $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException) {
          // En cas d'échec de la connexion, renvoyer une réponse avec un code d'erreur
          http_response_code(500);
          echo json_encode(array("error" => "Connection failed: An error occurred while connecting to the database."));
          die();
      }

      // Requête SQL pour récupérer les informations
      $sql = "SELECT
                  (SELECT COUNT(*) FROM student_applied_for) AS nb_with_internship,
                  (SELECT COUNT(*) FROM account WHERE id_account NOT IN (SELECT account_id FROM student_applied_for)) AS nb_without_internship,
                  (SELECT COUNT(i.id_internship) FROM internship i WHERE i.id_internship NOT IN (SELECT sa.internship_id FROM student_applied_for sa) AND EXISTS (SELECT 1 FROM internship_need_skill ins WHERE ins.internship_id = i.id_internship AND ins.skill_id = 1)) AS not_internship_gene,
                  (SELECT COUNT(i.id_internship) AS nombre_de_stages_non_pourvus FROM internship i WHERE i.id_internship NOT IN (SELECT sa.internship_id FROM student_applied_for sa) AND EXISTS (SELECT 1 FROM internship_need_skill ins WHERE ins.internship_id = i.id_internship AND ins.skill_id = 2)) AS not_internship_btp,
                  (SELECT COUNT(i.id_internship) AS nombre_de_stages_non_pourvus FROM internship i WHERE i.id_internship NOT IN (SELECT sa.internship_id FROM student_applied_for sa) AND EXISTS (SELECT 1 FROM internship_need_skill ins WHERE ins.internship_id = i.id_internship AND ins.skill_id = 3)) AS not_internship_info,
                  (SELECT COUNT(*) FROM students_has_wish_listed) AS nb_wishlist";

      $stmt = $dbh->prepare($sql);
      $stmt->execute();
      $data = $stmt->fetch(PDO::FETCH_ASSOC);

      // Fermeture de la connexion
      $dbh = null;
    ?>
    <div class="container flx2" id="stats">
      <div class="flx2">
        <div class="flx2_1">
          <div>
            <div style="border: none;">Nombre de personnes avec un stage</div>
              <div style="font-size: 3vh; border: none;"><?php echo $data['nb_with_internship']; ?></div>
            </div>
            <div>
              <div style="border: none;">Nombre de personnes sans stage</div>
                <div style="font-size: 3vh; border: none;"><?php echo $data['nb_without_internship']; ?></div>
            </div>
            <div>
              <div style="border: none;">Stage en attente</div>
                <div style="border: none;">Gene : <?php echo $data['not_internship_gene']; ?></div>
                <div style="border: none;">BTP : <?php echo $data['not_internship_btp']; ?></div>
                <div style="border: none;">Info : <?php echo $data['not_internship_info']; ?></div>
            </div>
            <div>
              <div style="border: none;">Nombre de stages en favoris</div>
              <div style="font-size: 3vh; border: none;"><?php echo $data['nb_wishlist']; ?></div>
            </div>
          </div>
        <div class="flx2_2">
          <div>
            <canvas id="myPieChart" class="#myPieChart"></canvas>
          </div>
        </div>
      </div> 
    </div>
    <div class="container flx2" id="comptes"> 
      <div class="flx2">
        <div class="top-container">
        <?php
          try {
              $user = 'root';
              $pass = '';
              $dbh = new PDO('mysql:host=localhost;dbname=projetweb', $user, $pass);
              $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch (PDOException) {
              // En cas d'échec de la connexion, renvoyer une réponse avec un code d'erreur
              http_response_code(500);
              echo json_encode(array("error" => "Connection failed: An error occurred while connecting to the database."));
              die();
          }

          // Requête SQL pour récupérer les informations des comptes
          $sql = "SELECT * FROM account";
          $stmt = $dbh->prepare($sql);
          $stmt->execute();
          $accounts = $stmt->fetchAll(PDO::FETCH_ASSOC);

          // Fermeture de la connexion
          $dbh = null;
        ?>
          <div class="box65" style="overflow-y: scroll; height: 300px;">
              <table>
                  <thead>
                      <tr>
                          <th>Identifiant</th>
                          <th>Prénom</th>
                          <th>Nom</th>
                          <th>Email</th>
                          <th>Rôle</th>
                          <th>Promotion</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($accounts as $account): ?>
                          <tr>
                              <td><?php echo $account['id_account']; ?></td>
                              <td><?php echo $account['first_name']; ?></td>
                              <td><?php echo $account['last_name']; ?></td>
                              <td><?php echo $account['email']; ?></td>
                              <td><?php echo $account['role_id']; ?></td>
                              <td><?php echo $account['promotion_id']; ?></td>
                          </tr>
                      <?php endforeach; ?>
                  </tbody>
              </table>
          </div>
          <div class="box20"></div>
        </div>
        <div class="flx2_1">
          <div>sfdsd</div>
          <div>sfdsd</div>
          <div>sfdsd</div>
          <div>sfdsd</div>
        </div>
      </div>
    </div> 
    <div class="container flx2" id="stages">
      <div class="flx2">
        <div class="top-container">
          <div class="box65"></div>
          <div class="box20"></div>
        </div>
        <div class="flx2_1">
          <div>sfdsd</div>
          <div>sfdsd</div>
        </div>
      </div>
    </div>
  </div>
  <button class="burger" onclick="toggleMenu()">
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
  </button>

  <div id="mobile-nav" class="menu">
    <div class="logo-container">
        <img src="/images/logo-classic.webp" alt="Logo" class="logo">
    </div>
    <div class="nav-link">
      <p id="nav-stats" onclick="showStats()">Affichage des statistiques</p>
      <hr>
      <p id="nav-comptes" onclick="showComptes()">Information comptes</p>
      <hr>
      <p id="nav-stages" onclick="showStages()">Information stages</p>
    </div>
    <div class="nav-link-bottom">
      <p onclick="showAccountInfo()">Information du compte</p>
      <p onclick="switchToStudentView()">Passage en vue étudiant</p>
      <p onclick="logout()">Déconnexion</p>
    </div>
    <button class="cancel" onclick="toggleMenu()">✖ Annuler</button>
  </div>
</div>
  <script src="assets/JS/dashboard.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>
