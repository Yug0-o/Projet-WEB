// Get the button element
const modifyButton = document.querySelector('.modify');

// Add event listener to the button
modifyButton.addEventListener('click', function() {
    // Toggle the text of the button
    if (modifyButton.textContent === 'Modify Your Information') {
        modifyButton.textContent = 'Save';
        // Transform div elements to input elements
        const infoDivs = document.querySelectorAll('.info');
        infoDivs.forEach(div => {
            const element = document.createElement('input');
            if (div.tagName !== 'A') { // Check if the element is not a link
                element.value = div.textContent;
            } else {
                // create a file upload element
                element.type = 'file';
                element.name = 'file';
                // Store the old path in a data attribute
                element.dataset.oldPath = div.href;
            }
            element.classList.add('info'); // Add the "info" class to the input
            div.parentNode.replaceChild(element, div);
        });
        // Change the gap to 25px for the div with class .profile-info
        const profileInfoDiv = document.querySelector('.profile-info');
        profileInfoDiv.style.gap = '25px';
    } else {
        modifyButton.textContent = 'Modify Your Information';
        // Transform input elements back to div elements
        const infoInputs = document.querySelectorAll('.info');
        infoInputs.forEach(input => {
            if (input.name === 'file') {
                // Create a link element
                const element = document.createElement('a');
                const filePath = input.files.length > 0 ? input.files[0].name : input.dataset.oldPath;
                const fileName = filePath.split('/').pop(); // Get the last part of the path
                element.href = filePath;
                element.target = '_blank';
                element.textContent = fileName; // Display only the last part of the path
                element.classList.add('info'); // Add the "info" class to the div
                input.parentNode.replaceChild(element, input);
            } else {
                const element = document.createElement('div');
                element.textContent = input.value;
                element.classList.add('info'); // Add the "info" class to the div
                input.parentNode.replaceChild(element, input);
            }
        });
        // Reset the gap for the div with class .profile-info
        const profileInfoDiv = document.querySelector('.profile-info');
        profileInfoDiv.style.gap = '';
    }
});

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
        url: 'get_wishlist_data.php', // Make sure the path is correct
        dataType: 'json',
        success: function (jobData) {
            // Data retrieved successfully
            console.log(jobData); // Display data in the console for verification

            // Calculate the total number of pages
            const totalPages = Math.ceil(jobData.length / jobsPerPage);

            // Display job listings for the current page
            displayJobs(jobData, totalPages);
        },
        error: function (xhr, status, error) {
            // An error occurred while fetching data
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
            <h3>${job.title}</h3>
            <p>${job.company_name} - ${job.address}</p>`;
        jobElement.appendChild(jobInfoElement);

        const jobDescriptionElement = document.createElement('div');
        jobDescriptionElement.classList.add('job-description');
        jobDescriptionElement.innerHTML = `<p>${job.description}</p>`;
        jobElement.appendChild(jobDescriptionElement);

        jobList.appendChild(jobElement);
    }

    // Display pagination
    displayPagination(totalPages);
}

// Fetch job data and display jobs on initial page load
fetchAndDisplayJobs();
