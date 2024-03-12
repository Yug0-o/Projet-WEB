//Function to authorize or not the entered data
function verifData()
{
    var champtel = document.getElementById('tel').value;
    if (champtel.length != 10)
    {
        document.getElementById("error-tel").style.display = "block";
        return false;
    }
    document.getElementById("error-tel").style.display = "none";
    alert("Formulaire soumis"); //Temporary --> once submitted, will reload the page and a green message will appear
    return true;
}

//Function to authorize numbers only in specified input
function restrictToNumbers(inputField) {
    inputField.addEventListener('input', function () {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
}

//Function call to restraint the "Telephone" to numbers only
var telephoneField = document.getElementsByName('tel')[0];
restrictToNumbers(telephoneField);