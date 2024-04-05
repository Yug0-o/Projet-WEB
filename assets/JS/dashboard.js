const ui_para = localStorage.getItem('ui');
switch (ui_para) {
  case 'showStages':
    showStages(); 
    break;
  case 'showComptes':
    showComptes(); 
    break;
  case 'showStats':
    showStats(); 
    break;

  default:
    break;
}


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

  // Make an AJAX request to retrieve data from the API
  fetch('MVC/data_dashboard.php')
    .then(response => response.json())
    .then(data => {
      // Extract the skills and associated numbers from the received data
      const labels = data.map(item => item.skill_name);
      const dataCounts = data.map(item => item.count);

      // Set data for chart
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

      // Set options for the chart
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

      // Create the chart
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
  var burger = document.querySelector('.burger');
  burger.classList.toggle('active');
  nav.classList.toggle('show');
}


function showStats() {
  document.getElementById('stats').style.display = 'flex';
  document.getElementById('comptes').style.display = 'none';
  document.getElementById('stages').style.display = 'none';
  document.querySelectorAll('#nav-stats').forEach(item => item.classList.add('active'));
  document.querySelectorAll('#nav-comptes').forEach(item => item.classList.remove('active'));
  document.querySelectorAll('#nav-stages').forEach(item => item.classList.remove('active'));
  localStorage.setItem('ui', 'showStats');
}

function showComptes() {
  document.getElementById('comptes').style.display = 'flex';
  document.getElementById('stats').style.display = 'none';
  document.getElementById('stages').style.display = 'none';
  document.querySelectorAll('#nav-comptes').forEach(item => item.classList.add('active'));
  document.querySelectorAll('#nav-stats').forEach(item => item.classList.remove('active'));
  document.querySelectorAll('#nav-stages').forEach(item => item.classList.remove('active'));
  localStorage.setItem('ui', 'showComptes');
}

function showStages() {
  document.getElementById('stages').style.display = 'flex';
  document.getElementById('comptes').style.display = 'none';
  document.getElementById('stats').style.display = 'none';
  document.querySelectorAll('#nav-stages').forEach(item => item.classList.add('active'));
  document.querySelectorAll('#nav-comptes').forEach(item => item.classList.remove('active'));
  document.querySelectorAll('#nav-stats').forEach(item => item.classList.remove('active'));
  localStorage.setItem('ui', 'showStages');
}


function showAccountInfo() {
  window.location.href = "account.php";
}

function switchToStudentView() {
  window.location.href = "research.php";
}




//------------------------------------------------------------
//------------ACCOUNT




function insertData() {
  const firstName = document.getElementById('first_name').value.trim();
  const lastName = document.getElementById('last_name').value.trim();
  const email = document.getElementById('email').value.trim();
  const password = document.getElementById('password').value.trim();
  const role_id = document.getElementById('role_id').value.trim();
  const promotion_id = document.getElementById('promotion_id').value.trim();  
  
  if (!firstName || !lastName) {
    alert('Veuillez entrer un prénom et un nom valides.');
    return;
  }
  if (!email) {
    alert('Veuillez entrer une adresse e-mail valide.');
    return;
  }
  if (!password) {
    alert('Veuillez entrer un mot de passe valide.');
    return;
  }

  // Make an AJAX request to send the data to the PHP script
  $.ajax({
      type: "POST",
      url: "MVC/CRUD_dashboard_1.php",
      data: { 
          first_name: firstName,
          last_name: lastName,
          email: email,
          password: password,
          role_id: role_id,
          promotion_id: promotion_id,
          center_id: 1 // Replace this value with the appropriate center identifier
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
  const firstName = document.getElementById('first_name').value.trim();
  const lastName = document.getElementById('last_name').value.trim();
  const email = document.getElementById('email').value.trim();
  const password = document.getElementById('password').value.trim();
  const role_id = document.getElementById('role_id').value.trim();
  const promotion_id = document.getElementById('promotion_id').value.trim();

  if (!firstName || !lastName) {
    alert('Veuillez entrer un prénom et un nom valides.');
    return;
  }
  if (!email) {
    alert('Veuillez entrer une adresse e-mail valide.');
    return;
  }
  if (!password) {
    alert('Veuillez entrer un mot de passe valide.');
    return;
  }


  // Make an AJAX request to send the data to the PHP script
  $.ajax({
      type: "POST",
      url: "MVC/CRUD_dashboard_1.php",
      data: { 
          first_name: firstName,
          last_name: lastName,
          email: email,
          password: password,
          role_id: role_id, // Replace this value with the appropriate role
          promotion_id: promotion_id, // Replace this value with the appropriate promotion ID
          center_id: 1 // Replace this value with the appropriate center identifier
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

// Function to delete account based on email address
function deleteAccount() {
  const email = document.getElementById('email').value.trim();

  if (!email) {
    alert('Veuillez entrer une adresse e-mail valide.');
    return;
  }

  // Make an AJAX request to send the email to the PHP script
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

// Function to remove duplicates from the "account" table
function removeDuplicateAccounts() {
  // Perform an AJAX request to remove duplicates
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




//------------------------------------------------------------
//------------COMPANIES

// Debounce function
function debounce(func, wait) {
  let timeout;
  return function(...args) {
      const context = this;
      clearTimeout(timeout);
      timeout = setTimeout(() => func.apply(context, args), wait);
  };
}

let lastValidAddress = '';

// Event listener for address input
document.getElementById('address').addEventListener('input', debounce(function() {
  const address = this.value;
  if(address.length > 3){
      fetch('https://api-adresse.data.gouv.fr/search/?q='+address)
          .then(response => response.json())
          .then(data => {
              if(data.features.length > 0){
                  const dataList = document.getElementById('address-suggestions');
                  dataList.innerHTML = ''; // Clear previous suggestions
                  data.features.forEach(item => {
                      // Create a new <option> element for each suggestion
                      const option = document.createElement('option');
                      option.value = item.properties.label;
                      dataList.appendChild(option);
                  });
              }
          });
  }
}, 500));

// Event listener for address input change
document.getElementById('address').addEventListener('change', function() {
  const address = this.value;
  const options = document.querySelectorAll('#address-suggestions option');
  const optionsArray = Array.from(options).map(opt => opt.value);
  if (!optionsArray.includes(address)) {
    this.value = lastValidAddress;
  } else {
    lastValidAddress = address;
  }
});

function insertDataCompanies() {
  const companyName = document.getElementById('company_name').value.trim();
  const sector = document.getElementById('sector').value.trim();
  const studentVisible = document.getElementById('student_visible').value.trim();
  const address = document.getElementById('address').value.trim();
  const countryId = document.getElementById('country_id').value.trim();

  if (!companyName || !sector || !studentVisible || !address || !countryId) {
    alert('Veuillez remplir tous les champs.');
    return;
  }

  // Use Nominatim API to get full address
  if(address.length > 3){
    $.getJSON('https://nominatim.openstreetmap.org/search?format=json&q='+address, function(data) {
        if(data.length > 0){
            $('#address').val(data[0].display_name);
        }
    });
  }

  // Make an AJAX request to send the data to the PHP script
  $.ajax({
      type: "POST",
      url: "MVC/CRUD_dashboard_1.php",
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
      },
      error: function(xhr, status, error) {
          console.error('Erreur lors de l\'insertion des données :', error);
          alert('Erreur lors de l\'insertion des données. Veuillez réessayer.');
      }
  });
  location.reload();
}

function updateDataCompanies() {
  const companyName = document.getElementById('company_name').value;
  const sector = document.getElementById('sector').value;
  const studentVisible = document.getElementById('student_visible').value;
  const address = document.getElementById('address').value;
  const countryId = document.getElementById('country_id').value;

  // Make an AJAX request to send the data to the PHP script
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
          // Here you can add other actions to be performed after the successful update
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




//------------------------------------------------------------
//------------INTERNSHIP




function insertInternship() {
  const title = document.getElementById('title').value;
  const duration = document.getElementById('duration').value;
  const description = document.getElementById('description').value;
  const company_id = document.getElementById('company_id').value;
  const offer_date = document.getElementById('offer_date').value;
  const available_places = document.getElementById('available_places').value;
  const id_skill = document.getElementById('id_skill').value;

  // Make an AJAX request to send the data to the PHP script
  $.ajax({
      type: "POST",
      url: "MVC/CRUD_dashboard_1_internship.php",
      data: { 
          title: title,
          offer_date: offer_date,
          available_places: available_places,
          duration: duration,
          description: description,
          company_id: company_id,
          id_skill: id_skill
      },
      success: function(response) {
          console.log(response);
          alert('Données insérées avec succès !');
          // Here you can add other actions to be performed after successful insertion
      },
      error: function(xhr, status, error) {
          console.error('Erreur lors de l\'insertion des données :', error);
          alert('Erreur lors de l\'insertion des données. Veuillez réessayer.');
      }
  });
}

function updateInternship() {
  const internship_id = document.getElementById('internship_id').value;
  const title = document.getElementById('title').value;
  const offerDate = document.getElementById('offer_date').value;
  const available_places = document.getElementById('available_places').value;
  const duration = document.getElementById('duration').value;
  const description = document.getElementById('description').value;
  const companyId = document.getElementById('company_id').value;

  // Perform an AJAX request to update the data
  $.ajax({
      type: "POST",
      url: "MVC/CRUD_dashboard_2_internship.php",
      data: {
          internship_id: internship_id,
          title: title,
          offer_date: offerDate,
          available_places: available_places,
          duration: duration,
          description: description,
          company_id: companyId
      },
      success: function(response) {
          console.log(response);
          alert('Données mises à jour avec succès !');
          location.reload(); // Refresh page after deletion
      },
      error: function(xhr, status, error) {
          console.error('Erreur lors de la mise à jour des données :', error);
          alert('Erreur lors de la mise à jour des données. Veuillez réessayer.');
      }
  });
}

function deleteInternship() {
  const internship_id = document.getElementById('internship_id').value;

  // Perform an AJAX request to delete the data
  $.ajax({
      type: "POST",
      url: "MVC/CRUD_dashboard_3_internship.php",
      data: {
          internship_id: internship_id
      },
      success: function(response) {
          console.log(response);
          alert('Données supprimées avec succès !');
          location.reload(); // Refresh page after deletion
      },
      error: function(xhr, status, error) {
          console.error('Erreur lors de la suppression des données :', error);
          alert('Erreur lors de la suppression des données. Veuillez réessayer.');
      }
  });
}
