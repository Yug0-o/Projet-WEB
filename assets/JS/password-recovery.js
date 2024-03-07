// Select the input fields and the buttons
const emailInput = document.querySelector('input[type="email"]');
const submit = document.querySelector('button[type="submit"]');

function validateEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

// Function to enable or disable the buttons
function updateButtons() {
    const email = emailInput.value.trim();

    const isEmailValid = validateEmail(email);

    submit.classList.toggle('enabled', isEmailValid);
    submit.classList.toggle('disabled', !(isEmailValid));
    submit.disabled = !(isEmailValid);
}

// Add event listeners to the input fields
emailInput.addEventListener('input', updateButtons);


// Call the function initially to set the initial state of the buttons
updateButtons();