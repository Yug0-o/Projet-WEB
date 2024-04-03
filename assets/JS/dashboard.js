const navItems = document.querySelectorAll(".nav-item");

navItems.forEach((navItem, i) => {
  navItem.addEventListener("click", () => {
    navItems.forEach((item, j) => {
      item.className = "nav-item";
    });
    navItem.className = "nav-item active";
  });
});


/* graph chart */

document.addEventListener("DOMContentLoaded", function() {
  console.log("DOM Content Loaded"); // Check if DOMContentLoaded event is fired
  
  // Get the canvas element from the HTML
  const canvas = document.getElementById('piechart');
  console.log("Canvas Element:", canvas); // Check if canvas element is correctly accessed
  
  // Create an array of group names and their corresponding values
  const groups = ['Généraliste', 'Informatique', 'BTP'];
  const values = [30, 50, 20];
  
  /* renvoyé une erreur, 'canvas' est vide, il y a pas d'element avec l'id piechart */
  // Create a new pie chart
  // new Chart(canvas, {
  //     type: 'doughnut',
  //     data: {
  //         labels: groups,
  //         datasets: [{
  //             data: values,
  //             backgroundColor: ['red', 'blue', 'green'], // Customize the colors of the slices
  //         }],
  //     },
  // });

  /*tab chart*/

  document.addEventListener("DOMContentLoaded", function() {
    console.log("DOM Content Loaded"); // Check if DOMContentLoaded event is fired
    
    // Get the canvas element from the HTML
    const canvas = document.getElementById('lineChart')
    
    // Create an array of x values
    const xValues = [100, 200, 300, 400, 500, 600, 700, 800, 900, 1000];
    
    // Create datasets
    const dataset1 = {
      label: 'Dataset 1',
      data: [860, 1140, 1060, 1060, 1070, 1110, 1330, 2210, 7830, 2478],
      borderColor: 'red',
      fill: false
    };
    console.log("Dataset 1:", dataset1); // Check dataset1
    
    // Create options
    const options = {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    };
    console.log("Options:", options); // Check options
    
    // Create a new line chart
    new Chart(canvas, {
      type: 'line',
      data: {
        labels: xValues,
        datasets: [dataset1]
      },
      options: options
    });
    console.log("Line Chart Initialized"); // Check if line chart initialization code is executed
  });
});


document.addEventListener("DOMContentLoaded", function() {
  console.log("DOM Content Loaded");

  var canvas = document.getElementById('myPieChart');
  var ctx = canvas.getContext('2d');
  canvas.width = canvas.parentNode.clientWidth;
  canvas.height = canvas.parentNode.clientHeight;

  // Effectuer une requête AJAX pour récupérer les données depuis l'API
  fetch('MVC/data_dashboard.php')
    .then(response => response.json())
    .then(data => {
      // Extraire les compétences et les nombres associés depuis les données reçues
      const labels = data.map(item => item.skill_name);
      const dataCounts = data.map(item => item.count);

      // Définir les données pour le graphique
      const chartData = {
        labels: ['BTP', 'Généraliste', 'Informatique'],
        datasets: [{
          label: "Nombre de stages",
          data: dataCounts,
          backgroundColor: [
            'red',
            'blue',
            'green',
            'purple',
            'orange'
          ],
          borderWidth: 1
        }]
      };

      // Définir les options pour le graphique
      const options = {
        aspectRatio: 1,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            position: 'right',
            onResize: function(chart, size) {
              if (size.width < 1000) {
                chart.options.plugins.legend.labels.fontSize = 20;
              } else {
                chart.options.plugins.legend.labels.fontSize = 12;
              }
            }
          }
        }
      };

      // Créer le graphique
      new Chart(ctx, {
        type: 'pie',
        data: chartData,
        options: options
      });
    })
    .catch(error => {
      console.error('Error fetching data:', error);
    });
});


function toggleMenu() {
  var nav = document.getElementById('mobile-nav');
  nav.classList.toggle('show');
}


function showStats() {
  document.getElementById('stats').style.display = 'block';
  document.getElementById('comptes').style.display = 'none';
  document.getElementById('stages').style.display = 'none';
  document.getElementById('nav-stats').classList.add('active');
  document.getElementById('nav-comptes').classList.remove('active');
  document.getElementById('nav-stages').classList.remove('active');
}

function showComptes() {
  document.getElementById('comptes').style.display = 'block';
  document.getElementById('stats').style.display = 'none';
  document.getElementById('stages').style.display = 'none';
  document.getElementById('nav-comptes').classList.add('active');
  document.getElementById('nav-stats').classList.remove('active');
  document.getElementById('nav-stages').classList.remove('active');
}

function showStages() {
  document.getElementById('stages').style.display = 'block';
  document.getElementById('comptes').style.display = 'none';
  document.getElementById('stats').style.display = 'none';
  document.getElementById('nav-stages').classList.add('active');
  document.getElementById('nav-comptes').classList.remove('active');
  document.getElementById('nav-stats').classList.remove('active');
}

function showAccountInfo() {
  window.location.href = "account.php";
}

function switchToStudentView() {
  window.location.href = "research.php";
}

function insertData() {
  const firstName = document.getElementById('first_name').value;
  const lastName = document.getElementById('last_name').value;
  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;

  // Effectuer une requête AJAX pour envoyer les données au script PHP
  $.ajax({
      type: "POST",
      url: "MVC/CRUD_dashboard_1.php",
      data: { 
          first_name: firstName,
          last_name: lastName,
          email: email,
          password: password,
          role_id: 1, // Remplacez cette valeur par le rôle approprié
          promotion_id: 1, // Remplacez cette valeur par l'identifiant de la promotion appropriée
          center_id: 1 // Remplacez cette valeur par l'identifiant du centre approprié
      },
      success: function(response) {
          console.log(response);
          alert('Données insérées avec succès !');
      },
      error: function(xhr, status, error) {
          console.error('Erreur lors de l\'insertion des données :', error);
          alert('Erreur lors de l\'insertion des données. Veuillez réessayer.');
      }
  });
  location.reload();
}

function updateData() {
  const firstName = document.getElementById('first_name').value;
  const lastName = document.getElementById('last_name').value;
  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;

  // Effectuer une requête AJAX pour envoyer les données au script PHP
  $.ajax({
      type: "POST",
      url: "MVC/CRUD_dashboard_1.php",
      data: { 
          first_name: firstName,
          last_name: lastName,
          email: email,
          password: password,
          role_id: 1, // Remplacez cette valeur par le rôle approprié
          promotion_id: 1, // Remplacez cette valeur par l'identifiant de la promotion appropriée
          center_id: 1 // Remplacez cette valeur par l'identifiant du centre approprié
      },
      success: function(response) {
          console.log(response);
          alert('Données mises à jour avec succès !');
      },
      error: function(xhr, status, error) {
          console.error('Erreur lors de la mise à jour des données :', error);
          alert('Erreur lors de la mise à jour des données. Veuillez réessayer.');
      }
  });
  location.reload();
}

// Fonction pour supprimer le compte basé sur l'adresse e-mail
function deleteAccount() {
  const email = document.getElementById('email').value;

  // Effectuer une requête AJAX pour envoyer l'e-mail au script PHP
  $.ajax({
      type: "POST",
      url: "MVC/CRUD_dashboard_2.php",
      data: { 
          action: 'delete',
          email: email
      },
      success: function(response) {
          console.log(response);
          alert(response);
      },
      error: function(xhr, status, error) {
          console.error('Erreur lors de la suppression du compte :', error);
          alert('Erreur lors de la suppression du compte. Veuillez réessayer.');
      }
  });
  location.reload();
}

// Fonction pour supprimer les doublons de la table "account"
function removeDuplicateAccounts() {
  // Effectuer une requête AJAX pour supprimer les doublons
  $.ajax({
      type: "POST",
      url: "MVC/CRUD_dashboard_2.php",
      data: { 
          action: 'removeDuplicates'
      },
      success: function(response) {
          console.log(response);
          alert(response);
      },
      error: function(xhr, status, error) {
          console.error('Erreur lors de la suppression des doublons :', error);
          alert('Erreur lors de la suppression des doublons. Veuillez réessayer.');
      }
  });
  location.reload();
}












function insertDataCompanies() {
  const companyName = document.getElementById('company_name').value;
  const sector = document.getElementById('sector').value;
  const studentVisible = document.getElementById('student_visible').value;
  const address = document.getElementById('address').value;
  const countryId = document.getElementById('country_id').value;

  // Effectuer une requête AJAX pour envoyer les données au script PHP
  $.ajax({
      type: "POST",
      url: "MVC/CRUD_dashboard_1_companies.php",
      data: { 
          company_name: companyName,
          sector: sector,
          student_visible: studentVisible,
          address: address,
          country_id: countryId
      },
      success: function(response) {
          console.log(response);
          alert('Données insérées avec succès !');
          // Vous pouvez ajouter ici d'autres actions à effectuer après l'insertion réussie
      },
      error: function(xhr, status, error) {
          console.error('Erreur lors de l\'insertion des données :', error);
          alert('Erreur lors de l\'insertion des données. Veuillez réessayer.');
      }
  });
}

function updateDataCompanies() {
  const companyName = document.getElementById('company_name').value;
  const sector = document.getElementById('sector').value;
  const studentVisible = document.getElementById('student_visible').value;
  const address = document.getElementById('address').value;
  const countryId = document.getElementById('country_id').value;

  // Effectuer une requête AJAX pour envoyer les données au script PHP
  $.ajax({
      type: "POST",
      url: "MVC/CRUD_dashboard_2_companies.php",
      data: {
          company_name: companyName,
          sector: sector,
          student_visible: studentVisible,
          address: address,
          country_id: countryId
      },
      success: function(response) {
          console.log(response);
          alert('Données mises à jour avec succès !');
          // Vous pouvez ajouter ici d'autres actions à effectuer après la mise à jour réussie
      },
      error: function(xhr, status, error) {
          console.error('Erreur lors de la mise à jour des données :', error);
          alert('Erreur lors de la mise à jour des données. Veuillez réessayer.');
      }
  });
}

function deleteCompany() {
  const companyName = document.getElementById('company_name').value;
  if (confirm("Êtes-vous sûr de vouloir supprimer cette entreprise ?")) {
      $.ajax({
          type: "POST",
          url: "MVC/CRUD_dashboard_3_companies.php",
          data: { company_name: companyName },
          success: function(response) {
              console.log(response);
              alert('Entreprise supprimée avec succès !');
          },
          error: function(xhr, status, error) {
              console.error('Erreur lors de la suppression de l\'entreprise :', error);
              alert('Erreur lors de la suppression de l\'entreprise. Veuillez réessayer.');
          }
      });
  }
}
