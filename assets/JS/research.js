// Exemple de données d'emploi
const jobData = [
    { title: 'Développeur Web 1', company: 'ABC Inc.', location: 'Paris', description: 'Description du stage 1' },
    { title: 'Ingénieur logiciel 2', company: 'XYZ Corp.', location: 'Lyon', description: 'Description du stage 2' },
    { title: 'Designer UI/UX 3', company: '123 Designs', location: 'Marseille', description: 'Description du stage 3' },
    { title: 'Analyste des données 4', company: 'DataTech', location: 'Toulouse', description: 'Description du stage 4' },
    { title: 'Chef de projet 5', company: 'ProManage', location: 'Nice', description: 'Description du stage 5' },
    { title: 'Développeur Full Stack 6', company: 'TechCo', location: 'Nantes', description: 'Description du stage 6' },
    { title: 'Ingénieur en sécurité 7', company: 'SecureSys', location: 'Strasbourg', description: 'Description du stage 7' },
    { title: 'Spécialiste en marketing 8', company: 'MarketXpert', location: 'Bordeaux', description: 'Description du stage 8' },
    { title: 'Développeur mobile 9', company: 'MobileTech', location: 'Lille', description: 'Description du stage 9' },
    { title: 'Analyste financier 10', company: 'FinCorp', location: 'Rennes', description: 'Description du stage 10' },
    { title: 'Graphiste 11', company: 'CreativeDesign', location: 'Paris', description: 'Description du stage 11' },
    { title: 'Développeur Python 12', company: 'PyTech', location: 'Lyon', description: 'Description du stage 12' },
    { title: 'Ingénieur réseau 13', company: 'NetSys', location: 'Marseille', description: 'Description du stage 13' },

];

const jobsPerPage = 6;
let currentPage = 1;

function displayJobs() {
    const jobList = document.getElementById('jobList');
    jobList.innerHTML = '';

    const startIndex = (currentPage - 1) * jobsPerPage;
    const endIndex = startIndex + jobsPerPage;

    for (let i = startIndex; i < endIndex && i < jobData.length; i++) {
        const job = jobData[i];
        const jobElement = document.createElement('div');
        jobElement.classList.add('job');
        jobElement.innerHTML = `<h3>${job.title}</h3><p>${job.company} - ${job.location}</p>`;
        jobList.appendChild(jobElement);
    }
}

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

function displayJobs() {
    const jobList = document.getElementById('jobList');
    jobList.innerHTML = '';

    const startIndex = (currentPage - 1) * jobsPerPage;
    const endIndex = startIndex + jobsPerPage;

    for (let i = startIndex; i < endIndex && i < jobData.length; i++) {
        const job = jobData[i];
        const jobElement = document.createElement('div');
        jobElement.classList.add('job');

        const jobInfoElement = document.createElement('div');
        jobInfoElement.classList.add('job-info');
        jobInfoElement.innerHTML = `
            <h3>${job.title}</h3>
            <p>${job.company} - ${job.location}</p>
        `;
        jobElement.appendChild(jobInfoElement);

        const jobDescriptionElement = document.createElement('div');
        jobDescriptionElement.classList.add('job-description');
        jobDescriptionElement.innerHTML = `<p>${job.description}</p>`;
        jobElement.appendChild(jobDescriptionElement);

        jobList.appendChild(jobElement);
    }
}

function searchJobs() {
    // Ajoutez la logique de recherche en fonction des filtres
    // (utilisez les valeurs des filtres pour filtrer jobData)
    displayJobs();
    displayPagination();
}

// Affichez les offres d'emploi lors du chargement initial de la page
displayJobs();
displayPagination();
