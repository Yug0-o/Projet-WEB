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
  fetch('/data_dashboard.php')
    .then(response => response.json())
    .then(data => {
      // Extraire les compétences et les nombres associés depuis les données reçues
      const labels = data.map(item => item.skill_name);
      const dataCounts = data.map(item => item.count);

      // Définir les données pour le graphique
      const chartData = {
        labels: labels,
        datasets: [{
          label: "Nombre de compétences",
          data: dataCounts,
          backgroundColor: [
            'red',
            'blue',
            'yellow',
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