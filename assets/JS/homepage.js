//List of text to scroll
var texts = ["Ici vous trouverez facilement le stage dont vous avez besoin, grâce à notre interface facile d'utilisation qui regroupe plus d'une centaine de stages dans chaque domaine et région", "Codé par des étudiants pour des étudiants, Internship Etendard regroupe plus d'une centaine d'entreprises et vous permet de postuler facilement à celle de votre choix.", "Le stage est l'une des meilleurs façons de se lancer dans le monde professionnel tout en approfondissant ses connaissances. Pour beaucoup de cursus, un stage est nécessaire pour valider une année d'études et c'est pour cela que notre entreprise vous permet d'en trouver un facilement."];
var index = 0;

var textcontainer_accueil = document.getElementById("textcontainer_accueil");
var scrollingText = document.getElementById("scrollingText");

//Function to change text every x seconds
function changeText() {
    scrollingText.innerHTML = texts[index];
    index = (index + 1) % texts.length;
}
//Call the initial function
changeText();

//Define the interval to change the text every 2 seconds (adjust if needed)
setInterval(changeText, 5000);
