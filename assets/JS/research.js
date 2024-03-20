// Example job data
const jobData = [
    { title: 'Web Developer 1', company: 'ABC Inc.', location: 'Paris', description: 'Internship description 1' },
    { title: 'Software Engineer 2', company: 'XYZ Corp.', location: 'Lyon', description: 'Internship description 2' },
    { title: 'UI/UX Designer 3', company: '123 Designs', location: 'Marseille', description: 'Internship description 3' },
    { title: 'Data Analyst 4', company: 'DataTech', location: 'Toulouse', description: 'Internship description 4' },
    { title: 'Project Manager 5', company: 'ProManage', location: 'Nice', description: 'Internship description 5' },
    { title: 'Full Stack Developer 6', company: 'TechCo', location: 'Nantes', description: 'Internship description 6' },
    { title: 'Security Engineer 7', company: 'SecureSys', location: 'Strasbourg', description: 'Internship description 7' },
    { title: 'Marketing Specialist 8', company: 'MarketXpert', location: 'Bordeaux', description: 'Internship description 8' },
    { title: 'Mobile Developer 9', company: 'MobileTech', location: 'Lille', description: 'Internship description 9' },
    { title: 'Financial Analyst 10', company: 'FinCorp', location: 'Rennes', description: 'Internship description 10' },
    { title: 'Graphic Designer 11', company: 'CreativeDesign', location: 'Paris', description: 'Internship description 11' },
    { title: 'Python Developer 12', company: 'PyTech', location: 'Lyon', description: 'Internship description 12' },
    { title: 'Network Engineer 13', company: 'NetSys', location: 'Marseille', description: 'Internship description 13' },
];

// Number of jobs displayed per page
const jobsPerPage = 6;
// Starting page
let currentPage = 1;

// Function to display pagination
function displayPagination() {
    const pagination = document.getElementById('pagination');
    pagination.innerHTML = '';
    const totalPages = Math.ceil(jobData.length / jobsPerPage);

    for (let i = 1; i <= totalPages; i++) {
        const button = document.createElement('button');
        button.classList.add("enabled");
        button.innerText = i;
        button.onclick = function () {
            currentPage = i;
            displayJobs();
            displayPagination();
        };
        pagination.appendChild(button);
    }
}

// Function to display jobs on the page
function displayJobs(jobsToDisplay = jobData) {
    const jobList = document.getElementById('jobList');
    jobList.innerHTML = '';
    const startIndex = (currentPage - 1) * jobsPerPage;
    const endIndex = startIndex + jobsPerPage;

    for (let i = startIndex; i < endIndex && i < jobsToDisplay.length; i++) {
        const job = jobsToDisplay[i];
        const jobElement = document.createElement('div');
        jobElement.classList.add('job');
        jobElement.classList.add('animate');

        const jobInfoElement = document.createElement('div');
        jobInfoElement.classList.add('job-info');
        jobInfoElement.innerHTML = `
            <h3>${job.title}</h3>
            <p>${job.company} - ${job.location}</p>`;
        jobElement.appendChild(jobInfoElement);

        const jobDescriptionElement = document.createElement('div');
        jobDescriptionElement.classList.add('job-description');
        jobDescriptionElement.innerHTML = `<p>${job.description}</p>`;
        jobElement.appendChild(jobDescriptionElement);

        jobList.appendChild(jobElement);
        // add delay to each job element
        jobElement.style.animationDelay = `${(i - startIndex) * 0.03}s`;
    }
}

// Function to search for jobs based on a keyword
function searchJobs() {
    const keyword = document.getElementById('keyword').value.toLowerCase();
    const filteredJobs = jobData.filter(job => job.title.toLowerCase().includes(keyword) || job.location.toLowerCase().includes(keyword));
    currentPage = 1;
    displayJobs(filteredJobs);
    displayPagination();
}



// Get the search input element
const search = document.querySelector("input[type='text']");
// Add an event listener to trigger search when typing
search.addEventListener('input', searchJobs);

// Display job listings on initial page load
displayJobs();
// Display initial pagination
displayPagination();
