const emailInput = document.querySelector('input[type="email"]');
const passwordInput = document.querySelector('input[type="password"]');
const reset = document.querySelector('button[type="reset"]');
const submit = document.querySelector('button[type="submit"]');

//Check if the email is correct (contains @ and a dot)
function validateEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

//Check if the password is long enough
function validatePassword(password) {
    return password.length >= 8;
}

// Function to enable or disable the buttons
function updateButtons() {
    const email = emailInput.value.trim();
    const password = passwordInput.value.trim();

    const isEmailValid = validateEmail(email);
    const isPasswordValid = validatePassword(password);

    const allow_reset = email || password;
    const allow_submit = isEmailValid && isPasswordValid;

    // Toggle button states
    reset.classList.toggle('enabled', allow_reset);
    reset.classList.toggle('disabled', !allow_reset);
    reset.disabled = !allow_reset;

    submit.classList.toggle('enabled', allow_submit);
    submit.classList.toggle('disabled', !allow_submit);
    submit.disabled = !allow_submit;
}

// Function to verify credentials on server and redirect if valid
function verifyCredentials(email, password) {
    // Effectuer une requête Ajax pour vérifier les identifiants côté serveur
    fetch('check.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            email: email,
            password: password
        })
    })
    .then(response => {
        if (response.ok) {
            // Rediriger l'utilisateur vers la page suivante si les identifiants sont valides
            window.location.href = 'research.php';
        } else {
            // Afficher un message d'erreur ou prendre une autre action en cas d'identifiants invalides
            console.error('Invalid credentials');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

// Event listener for form submission
submit.addEventListener('click', function(event) {
    event.preventDefault(); // Prevent default form submission

    const email = emailInput.value.trim();
    const password = passwordInput.value.trim();

    // Vérifier les identifiants de l'utilisateur côté serveur
    verifyCredentials(email, password);
});

emailInput.addEventListener('input', updateButtons);
passwordInput.addEventListener('input', updateButtons);

// Event listener for reset button
reset.addEventListener('click', function() {
    setTimeout(updateButtons, 0);
});

// Call initially for button state
updateButtons();
