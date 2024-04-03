if (!sessionStorage.getItem('email')) {
    sessionStorage.setItem('callback', window.location.href);
    window.location.href = 'login.php';
}
// Function to fetch job data from server and display jobs
function fetchAndDisplayJobs() {
    $.ajax({
        type: "GET",
        url: 'MVC/get_job_data.php', // Assurez-vous que le chemin est correct
        dataType: 'json',
        success: function (jobData) {displayJobs(jobData);},
        error: function (xhr, status, error) {console.error('Error fetching job data:', error);}
    });
}
// Function to display jobs on the page
function displayJobs(jobData) {
    const jobList = document.getElementById('jobList');
    jobList.innerHTML = '';

    for (const job of jobData) {

        const job_container = document.createElement('div');
        job_container.id = job.id_internship;
        job_container.classList.add('job-container');
        job_container.classList.add('animate');

        const jobElement = document.createElement('div');
        jobElement.classList.add('job');
        jobElement.classList.add('animate');
        job_container.appendChild(jobElement);

        const jobInfoElement = document.createElement('div');
        jobInfoElement.classList.add('job-info');
        jobInfoElement.innerHTML = `
            <h3>${job.title}</h3>
            <p>${job.company_name} - ${job.address}</p>`;
        jobElement.appendChild(jobInfoElement);

        const jobDescriptionElement = document.createElement('div');
        jobDescriptionElement.classList.add('job-description');
        jobDescriptionElement.innerHTML = `<p>${job.description}</p>`;
        jobElement.appendChild(jobDescriptionElement);

        const buttonContainer = document.createElement('div');
        buttonContainer.classList.add('button-container');
        buttonContainer.classList.add('wishlist-action');
        buttonContainer.classList.add('animate');
        job_container.appendChild(buttonContainer);

        const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
        svg.id = job.id_internship;
        svg.setAttribute('viewBox', '0 0 24 24');
        svg.setAttribute('stroke-width', '2');
        svg.setAttribute('stroke-linecap', 'round');
        svg.setAttribute('stroke-linejoin', 'round');
        svg.classList.add('favorite-icon');
        if (sessionStorage.getItem('wishlist_ids') && JSON.parse(sessionStorage.getItem('wishlist_ids')).includes(job.id_internship)) {
            svg.classList.add('wished');
        }

        // Create path element
        const path = document.createElementNS('http://www.w3.org/2000/svg', 'path');
        path.setAttribute('d', 'M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z');

        svg.appendChild(path);
        // Append SVG to button
        buttonContainer.appendChild(svg);

        jobList.appendChild(job_container);

        // Add an event listener to the wishlist icon
        svg.addEventListener('click', function () {
            const wishlistIds = JSON.parse(sessionStorage.getItem('wishlist_ids')) || [];
            if (wishlistIds.includes(job.id_internship)) {
                // Remove the job from the wishlist
                const index = wishlistIds.indexOf(job.id_internship);
                wishlistIds.splice(index, 1);
                svg.classList.remove('wished');
            } else {
                // Add the job to the wishlist
                wishlistIds.push(job.id_internship);
                svg.classList.add('wished');
            }
            sessionStorage.setItem('wishlist_ids', JSON.stringify(wishlistIds));
        });

        // Add an event listener to the job container
        jobElement.addEventListener('click', function () {
            job_container.classList.toggle('focused');
        });
    }
}
// Function to search for jobs based on a keyword
function searchJobs() {
    const keyword = document.getElementById('keyword').value.toLowerCase();

    // Make an AJAX request to fetch job data based on the keyword
    $.ajax({
        type: "post",
        url: 'MVC/get_job_data.php',
        dataType: 'json',
        success: function (jobData) {
            // Filtrer les offres d'emploi basées sur le mot-clé
            const filteredJobs = jobData.filter(job => 
                (job.title && job.title.toLowerCase().includes(keyword)) ||
                (job.location && job.location.toLowerCase().includes(keyword))
            );
            displayJobs(filteredJobs); // Pass only one argument to the displayJobs function
        },
        error: function (xhr, status, error) {console.error('Error fetching job data:', error);}
    });
}
// Get the search input element
const search = document.querySelector("input[type='text']");
// Add an event listener to trigger search when typing
search.addEventListener('input', searchJobs);
// Get the search_query parameter from the URL
const urlParams = new URLSearchParams(window.location.search);
const searchQuery = urlParams.get('search_query');
// If search_query isn't empty, set it as the input value
if (searchQuery) {
    search.value = searchQuery;
    searchJobs();
}
// Fetch job data and display jobs on initial page load
fetchAndDisplayJobs();