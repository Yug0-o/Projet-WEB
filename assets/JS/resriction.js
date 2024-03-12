// Fonction pour autoriser uniquement les chiffres dans les champs spécifiés
function restrictToNumbers(inputField) {
    inputField.addEventListener('input', function () {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
}

// Appel de la fonction pour restreindre les champs "Code postal" et "Téléphone" aux chiffres
var telephoneField = document.getElementsByName('tel')[0];  // Ajout de cette ligne
restrictToNumbers(telephoneField);