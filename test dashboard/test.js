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

  // Check data arrays
  console.log("Groups:", groups);
  console.log("Values:", values);
  
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
    const canvas = document.getElementById('lineChart');
    console.log("Canvas Element:", canvas); // Check if canvas element is correctly accessed
    
    // Create an array of x values
    const xValues = [100, 200, 300, 400, 500, 600, 700, 800, 900, 1000];
    console.log("X Values:", xValues); // Check x values
    
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

  // Get the canvas element from the HTML
  var canvas = document.getElementById('myPieChart');
  var ctx = canvas.getContext('2d');

  // Set canvas width and height to match its container size
  canvas.width = canvas.parentNode.clientWidth;
  canvas.height = canvas.parentNode.clientHeight;

  // Define data
  var data = {
      labels: ['paul', 'gpt', 'hugo', 'charles', 'maxime', 'aurélien'],
      datasets: [{
          label: "people who fucked sam'mother",
          data: [12, 10, 3, 5, 2, 3],
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

  // Define options
  var options = {
    aspectRatio: 1,
    maintainAspectRatio: false,
    // Add any options you want here
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
  }


  // Create the pie chart
  var myPieChart = new Chart(ctx, {
      type: 'doughnut',
      data: data,
      options: options
  });

  // Redraw the chart whenever the window is resized
  window.addEventListener('resize', function() {
      canvas.width = canvas.parentNode.clientWidth;
      canvas.height = canvas.parentNode.clientHeight;
      myPieChart.resize();
      myPieChart.options = options;
      myPieChart.update();
  });
});

function toggleMenu() {
  var nav = document.getElementById('mobile-nav');
  nav.classList.toggle('show');
}



