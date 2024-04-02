// Number of jobs displayed per page
const jobsPerPage = 6;
// Starting page
let currentPage = 1;

// Function to display pagination
function displayPagination(totalPages) {
    const pagination = document.getElementById('pagination');
    pagination.innerHTML = '';

    for (let i = 1; i <= totalPages; i++) {
        const button = document.createElement('button');
        button.innerText = i;
        button.onclick = function () {
            currentPage = i;
            fetchAndDisplayJobs();
        };
        pagination.appendChild(button);
    }
}

// Function to fetch job data from server and display jobs
function fetchAndDisplayJobs() {
    $.ajax({
        type: "GET",
        url: 'get_job_data.php', // Assurez-vous que le chemin est correct
        dataType: 'json',
        success: function (jobData) {
            // Les données ont été récupérées avec succès
            console.log(jobData); // Affichez les données dans la console pour vérifier

            // Calcule le nombre total de pages
            const totalPages = Math.ceil(jobData.length / jobsPerPage);

            // Affiche les offres d'emploi pour la page courante
            displayJobs(jobData, totalPages);
        },
        error: function (xhr, status, error) {
            // Une erreur s'est produite lors de la récupération des données
            console.error('Error fetching job data:', error);
        }
    });
}

// Function to display jobs on the page
function displayJobs(jobData, totalPages) {
    const jobList = document.getElementById('jobList');
    jobList.innerHTML = '';

    const startIndex = (currentPage - 1) * jobsPerPage;
    const endIndex = startIndex + jobsPerPage;
    const jobsToDisplay = jobData.slice(startIndex, endIndex);

    for (const job of jobsToDisplay) {
        const jobElement = document.createElement('div');
        jobElement.classList.add('job');
        jobElement.classList.add('animate');

        const jobInfoElement = document.createElement('div');
        jobInfoElement.classList.add('job-info');
        jobInfoElement.innerHTML = `
            <h3>${job.id_internship}</h3>
            <p>${job.company_name} - ${job.address}</p>`;
        jobElement.appendChild(jobInfoElement);

        const jobDescriptionElement = document.createElement('div');
        jobDescriptionElement.classList.add('job-description');
        jobDescriptionElement.innerHTML = `<p>${job.description}</p>`;
        jobElement.appendChild(jobDescriptionElement);

        jobList.appendChild(jobElement);
    }

    // Affiche la pagination
    displayPagination(totalPages);
}

// Function to search for jobs based on a keyword
function searchJobs() {
    const keyword = document.getElementById('keyword').value.toLowerCase();

    // Make an AJAX request to fetch job data based on the keyword
    $.ajax({
        type: "GET",
        url: 'get_job_data.php',
        dataType: 'json',
        success: function (jobData) {
            // Les données ont été récupérées avec succès
            console.log(jobData); // Affichez les données dans la console pour vérifier

            // Filtrer les offres d'emploi basées sur le mot-clé
            const filteredJobs = jobData.filter(job => 
                (job.company_name && job.company_name.toLowerCase().includes(keyword)) ||
                (job.location && job.location.toLowerCase().includes(keyword))
            );
            currentPage = 1;
            const totalPages = Math.ceil(filteredJobs.length / jobsPerPage);

            // Affichez les offres d'emploi filtrées
            displayJobs(filteredJobs, totalPages);
        },
        error: function (xhr, status, error) {
            // Une erreur s'est produite lors de la récupération des données
            console.error('Error fetching job data:', error);
        }
    });
}

// Get the search input element
const search = document.querySelector("input[type='text']");
// Add an event listener to trigger search when typing
search.addEventListener('input', searchJobs);

// Fetch job data and display jobs on initial page load
fetchAndDisplayJobs();