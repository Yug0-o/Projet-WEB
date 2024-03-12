// Exemple de données d'emploi
const jobData = [
    { title: 'Développeur Web 1', company: 'ABC Inc.', location: 'Paris' },
    { title: 'Ingénieur logiciel 2', company: 'XYZ Corp.', location: 'Lyon' },
    { title: 'Designer UI/UX 3', company: '123 Designs', location: 'Marseille' },
    { title: 'Analyste des données 4', company: 'DataTech', location: 'Toulouse' },
    { title: 'Chef de projet 5', company: 'ProManage', location: 'Nice' },
    { title: 'Développeur Full Stack 6', company: 'TechCo', location: 'Nantes' },
    { title: 'Ingénieur en sécurité 7', company: 'SecureSys', location: 'Strasbourg' },
    { title: 'Spécialiste en marketing 8', company: 'MarketXpert', location: 'Bordeaux' },
    { title: 'Développeur mobile 9', company: 'MobileTech', location: 'Lille' },
    { title: 'Analyste financier 10', company: 'FinCorp', location: 'Rennes' },

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

function searchJobs() {
    // Ajoutez la logique de recherche en fonction des filtres
    // (utilisez les valeurs des filtres pour filtrer jobData)
    displayJobs();
    displayPagination();
}

// Affichez les offres d'emploi lors du chargement initial de la page
displayJobs();
displayPagination();
