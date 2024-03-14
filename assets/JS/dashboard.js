/*Dougnut chart*/

// Get the canvas element from the HTML
const canvas = document.getElementById('piechart');

// Create an array of group names and their corresponding values
const groups = ['Généraliste', 'Informatique', 'BTP'];
const values = [30, 50, 20];

// Create a new pie chart
new Chart(canvas, {
    type: 'doughnut',
    data: {
        labels: groups,
        datasets: [{
            data: values,
            backgroundColor: ['red', 'blue', 'green'], // Customize the colors of the slices
        }],
    },
});

/* graph chart */

const xValues = [100,200,300,400,500,600,700,800,900,1000];

new Chart("lineChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      data: [860,1140,1060,1060,1070,1110,1330,2210,7830,2478],
      borderColor: "red",
      fill: false
    },{
      data: [1600,1700,1700,1900,2000,2700,4000,5000,6000,7000],
      borderColor: "green",
      fill: false
    },{
      data: [300,700,2000,5000,6000,4000,2000,1000,200,100],
      borderColor: "blue",
      fill: false
    }]
  },
  options: {
    labels: groups,
    legend: {display: false}
  }
});