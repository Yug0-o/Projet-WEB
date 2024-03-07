// Liste des textes à faire défiler
var texts = ["Ici le nombre stage défile comme un rafale.", "Chez Internship Etendard nous placons nos espoir en vous et les génération future.", "Le stage est l'une des meilleurs façons de se lancer dans le monde actif tout en continuant à aprofondir ses connaissances."];
var index = 0;

var textcontainer_accueil = document.getElementById("textcontainer_accueil");
var scrollingText = document.getElementById("scrollingText");

// Fonction pour changer le texte toutes les x secondes
function changeText() {
    scrollingText.innerHTML = texts[index];
    index = (index + 1) % texts.length;
}

// Appeler la fonction initiale
changeText();

// Définir l'intervalle pour changer le texte toutes les 2 secondes (ajustez selon vos besoins)
setInterval(changeText, 2000);
