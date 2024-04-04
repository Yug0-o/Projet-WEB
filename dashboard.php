<!DOCTYPE html>
<html lang="fr">
<?php
define('SMARTY_DIR', 'libs\\');
require_once(SMARTY_DIR . 'Smarty.class.php');

$smarty_head = new Smarty();
$smarty_head->assign('dashboard', 'yes');
$smarty_head->assign('titre', 'Dashboard Admin');
$smarty_head->setTemplateDir('tpl/');
$smarty_head->display('head.tpl');
?>

<body>
  <div class="container">
    <div class="flx1">
      <div class="nav-logo">
        <a href="homepage.php"><img src="/images/logo-classic.webp" alt="Logo" class="logo"></a>
      </div>
      <div class="nav-items">
        <p id="nav-stats" onclick="showStats()">Affichage des statistiques</p>
        <p id="nav-comptes" onclick="showComptes()">Information comptes</p>
        <p id="nav-stages" onclick="showStages()">Information stages</p>
      </div>
      <div class="nav-items-bottom">
        <p onclick="showAccountInfo()">Information du compte</p>
        <p onclick="switchToStudentView()">Passage en vue étudiant</p>
      </div>
    </div>

    <div class="vertical-line"></div>

    <?php
    try {
      $user = 'root';
      $pass = '';
      $dbh = new PDO('mysql:host=localhost;dbname=projetweb', $user, $pass);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException) {
      // If the connection fails, return a response with an error code
      http_response_code(500);
      echo json_encode(array("error" => "Connection failed: An error occurred while connecting to the database."));
      die();
    }

    // SQL query to retrieve information
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

    // Closing the connection
    $dbh = null;
    ?>

    <!-- Stats display -->
    <div class="container flx2" id="stats">
      <div class="flx2">
        <div class="flx2_1">
          <div>
            <div class="underline">Nombre de personnes avec un stage</div>
            <div class="stat"><?php echo $data['nb_with_internship']; ?></div>
          </div>
          <div>
            <div class="underline">Nombre de personnes sans stage</div>
            <div class="stat"><?php echo $data['nb_without_internship']; ?></div>
          </div>
          <div>
            <div class="underline">Stages en attente</div>
            <div>Généraliste : <?php echo $data['not_internship_gene']; ?></div>
            <div>BTP : <?php echo $data['not_internship_btp']; ?></div>
            <div>Informatique : <?php echo $data['not_internship_info']; ?></div>
          </div>
          <div>
            <div class="underline">Nombre de stages en favoris</div>
            <div class="stat"><?php echo $data['nb_wishlist']; ?> <?php echo "\u{1f496}"; ?></div>

          </div>
        </div>
        <div class="flx2_2">
          <div>
            <canvas id="myPieChart" class="#myPieChart"></canvas>
          </div>
        </div>
      </div>
    </div>

    <!-- Account information -->
    <div class="container flx2 compte" id="comptes">
      <div class="flx2 compte">
        <div class="box_tableau_stats">
          <?php
          try {
            $user = 'root';
            $pass = '';
            $dbh = new PDO('mysql:host=localhost;dbname=projetweb', $user, $pass);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch (PDOException) {
            // If the connection fails, return a response with an error code
            http_response_code(500);
            echo json_encode(array("error" => "Connection failed: An error occurred while connecting to the database."));
            die();
          }

          // SQL query to retrieve account information
          $sql = "SELECT * FROM account";
          $stmt = $dbh->prepare($sql);
          $stmt->execute();
          $accounts = $stmt->fetchAll(PDO::FETCH_ASSOC);

          // Closing the connection
          $dbh = null;
          ?>
          <div class="box_tableau">
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
                <?php foreach ($accounts as $account) : ?>
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
          <div class="same_line_container">
          <?php
            try {
                $user = 'root';
                $pass = '';
                $dbh = new PDO('mysql:host=localhost;dbname=projetweb', $user, $pass);
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                // If the connection fails, display an error message
                echo "Connection failed: " . $e->getMessage();
                die();
            }

            // SQL query to count the number of students
            $sql_students = "SELECT COUNT(*) AS student_count FROM account WHERE role_id = 1"; // On suppose que le rôle étudiant a l'ID 1
            $stmt_students = $dbh->prepare($sql_students);
            $stmt_students->execute();
            $student_count = $stmt_students->fetch(PDO::FETCH_ASSOC)['student_count'];

            // SQL query to count the number of promotions
            $sql_promotions = "SELECT COUNT(*) AS promotion_count FROM promotions";
            $stmt_promotions = $dbh->prepare($sql_promotions);
            $stmt_promotions->execute();
            $promotion_count = $stmt_promotions->fetch(PDO::FETCH_ASSOC)['promotion_count'];

            // Closing the connection
            $dbh = null;
            ?>

            <div class="box1">
              <div class="underline">Nombre d'étudiants </div> 
              <div class="stat"><?php echo $student_count; ?></div>
            </div>
            <div class="box2">
              <div class="underline">Nombre de promotions </div>
              <div class="stat"><?php echo $promotion_count; ?></div>
            </div>
          </div>
        </div>
        <div class="box_CRUD">
          <div class="CRUD_inputs">
            <h2 class="underline">Modification des comptes</h2>
            <label for="first_name">Prénom :</label>
            <input type="text" id="first_name" name="first_name">
            <label for="last_name">Nom :</label>
            <input type="text" id="last_name" name="last_name">
            <label for="email">Email :</label>
            <input type="text" id="email" name="email">
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password">
            <select id="role_id" name="role_id">
                  <option value="1">Eleve</option>
                  <option value="2">Admin</option>
                  <option value="3">Pilot</option>
            </select>
            <select id="promotion_id" name="promotion_id">
                  <option value="1">2022</option>
                  <option value="2">2023</option>
                  <option value="3">2024</option>
            </select>
          </div>
          <div class="CRUD_buttons">
            <button onclick="insertData()">Insérer les données</button>
            <button onclick="updateData()">Modifier les données</button>
            <button onclick="deleteAccount()">Supprimer le compte</button>
            <button onclick="removeDuplicateAccounts()">Supprimer les doublons</button>
          </div>
        </div>
      </div>
    </div>


        <!-- Course information -->
        <div class="container flx2" id="stages">
          <div class="flx2">
            <div class="top-container">
              <div class="box65" style="overflow-y: scroll;">
                <?php
                try {
                  $user = 'root';
                  $pass = '';
                  $dbh = new PDO('mysql:host=localhost;dbname=projetweb', $user, $pass);
                  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException) {
                  // If the connection fails, return a response with an error code
                  http_response_code(500);
                  echo json_encode(array("error" => "Connection failed"));
                  die();
                }

                // SQL query to retrieve internship information with their associated skills
                $sql = "SELECT internship.id_internship, internship.title, internship.offer_date, internship.available_places, 
                          GROUP_CONCAT(skills.skill_name SEPARATOR ', ') AS skills_required
                    FROM internship 
                    INNER JOIN internship_need_skill ON internship.id_internship = internship_need_skill.internship_id
                    INNER JOIN skills ON internship_need_skill.skill_id = skills.id_skill
                    GROUP BY internship.id_internship";
                $stmt = $dbh->prepare($sql);
                $stmt->execute();
                $internships = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Closing the connection
                $dbh = null;
                ?>
                <table>
                  <thead>
                    <tr>
                      <th>Identifiant</th>
                      <th>Titre du stage</th>
                      <th>Date de l'offre</th>
                      <th>Places disponibles</th>
                      <th>Compétences requises</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($internships as $internship) : ?>
                      <tr>
                        <td><?php echo $internship['id_internship']; ?></td>
                        <td><?php echo $internship['title']; ?></td>
                        <td><?php echo $internship['offer_date']; ?></td>
                        <td><?php echo $internship['available_places']; ?></td>
                        <td><?php echo $internship['skills_required']; ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <div class="box65" style="overflow-y: scroll;">
                <?php
                try {
                  $user = 'root';
                  $pass = '';
                  $dbh = new PDO('mysql:host=localhost;dbname=projetweb', $user, $pass);
                  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException) {
                  // If the connection fails, return a response with an error code
                  http_response_code(500);
                  echo json_encode(array("error" => "Connection failed"));
                  die();
                }

                // SQL query to retrieve company information with their locations
                $sql = "SELECT companies.id_company, companies.company_name, companies.sector, companies.student_visible, locations.address, country.country_name 
                    FROM companies 
                    INNER JOIN companies_has_locations ON companies.id_company = companies_has_locations.id_company
                    INNER JOIN locations ON companies_has_locations.id_locations = locations.id_locations
                    INNER JOIN country ON locations.country_id = country.id_country";
                $stmt = $dbh->prepare($sql);
                $stmt->execute();
                $companies = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Closing the connection
                $dbh = null;
                ?>
                <table>
                  <thead>
                    <tr>
                      <th>Identifiant</th>
                      <th>Nom de l'entreprise</th>
                      <th>Secteur</th>
                      <th>Visible pour les étudiants</th>
                      <th>Adresse</th>
                      <th>Pays</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($companies as $company) : ?>
                      <tr>
                        <td><?php echo $company['id_company']; ?></td>
                        <td><?php echo $company['company_name']; ?></td>
                        <td><?php echo $company['sector']; ?></td>
                        <td><?php echo $company['student_visible'] ? 'Oui' : 'Non'; ?></td>
                        <td><?php echo $company['address']; ?></td>
                        <td><?php echo $company['country_name']; ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="flx2_1">
              <div style="overflow-y: scroll;">
                <h2 class="underline">Modification des stages</h2>
                <form id="internshipForm">
                    <label for="title">Titre :</label>
                    <input type="text" id="title" name="title">
                    <label for="offer_date">Date d'offre :</label>
                    <input type="date" id="offer_date" name="offer_date">
                    <label for="duration">Durée :</label>
                    <input type="text" id="duration" name="duration">
                    <label for="description">Description :</label>
                    <input type="description" id="description" name="description">
                    <label for="company_id">ID de l'entreprise :</label>
                    <input type="text" id="company_id" name="company_id">
                    <label for="available_places">Places disponibles :</label>
                    <input type="number" id="available_places" name="available_places" min="1">
                    <label for="id_skill">Compétences :</label>
                    <select id="id_skill" name="id_skill">
                      <option value="1">Generaliste</option>
                      <option value="2">BTP</option>
                      <option value="3">Informatique</option>
                    </select>
                    <div class="space"></div>
                    <button onclick="insertInternship()">Insérer les données</button>
                    <button onclick="updateInternship()">Modifier les données</button>
                    <button onclick="deleteInternship()">Supprimer l'entreprise</button>
                    <label for="internship_id">ID du stage :</label>
                    <input type="number" id="internship_id" name="internship_id">
                </form>
              </div>

              <div style="overflow-y: scroll;">
                <h2 class="underline">Modification des Entreprises</h2>
                <label for="company_name">Nom de l'entreprise :</label>
                <input type="text" id="company_name" name="company_name">
                <label for="sector">Secteur :</label>
                <input type="text" id="sector" name="sector">
                <label for="student_visible">Visible pour les étudiants :</label>
                <select id="student_visible" name="student_visible">
                  <option value="1">Oui</option>
                  <option value="0">Non</option>
                </select>
                <label for="address">Adresse :</label>
                <input type="text" id="address" name="address">
                <label for="country_id">Pays :</label>
                <select id="country_id" name="country_id">
                  <option value="1">France</option>
                  <option value="2">Germany</option>
                  <option value="3">USA</option>
                </select>
                <div class="space"></div>
                <button onclick="insertDataCompanies()">Insérer les données</button>
                <button onclick="updateDataCompanies()">Modifier les données</button>
                <button onclick="deleteCompany()">Supprimer l'entreprise</button>
              </div>
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
        </div>
        <button class="cancel" onclick="toggleMenu()">✖ Annuler</button>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="assets/JS/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>