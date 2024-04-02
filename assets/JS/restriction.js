function validateEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

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

    const champemail = document.getElementById('email').value;
    temp = validateEmail(champemail);
    if (temp == false)
    {
        document.getElementById("error-email").style.display = "block";
        return false;
    }
    document.getElementById("error-email").style.display = "none";
    localStorage.setItem("sent", "true");
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

if(localStorage.getItem("sent")==="true") {
    document.querySelector(".confirmation").style.display = "block";
    localStorage.setItem("sent", "false");
}

if (sessionStorage.getItem('email')) {
    document.getElementById('email').value = sessionStorage.getItem('email');
}