// Select the input fields and the buttons
const emailInput = document.querySelector('input[type="email"]');
const passwordInput = document.querySelector('input[type="password"]');
const reset = document.querySelector('button[type="reset"]');
const submit = document.querySelector('button[type="submit"]');


function validateEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

function validatePassword(password) {
    return password.length >= 8;
}

// Function to enable or disable the buttons
function updateButtons() {
    const email = emailInput.value.trim();
    const password = passwordInput.value.trim();

    const isEmailValid = validateEmail(email);
    const isPasswordValid = validatePassword(password);

    allow_reset = email || password;
    allow_submit = isEmailValid && isPasswordValid;

    // Toggle the enabled and disabled classes and set the disabled property based on the conditions
    reset.classList.toggle('enabled', allow_reset);
    reset.classList.toggle('disabled', !(allow_reset));
    reset.disabled = !(allow_reset);

    submit.classList.toggle('enabled', allow_submit);
    submit.classList.toggle('disabled', !(allow_submit));
    submit.disabled = !(allow_submit);
}

// Add event listeners to the input fields
emailInput.addEventListener('input', updateButtons);
passwordInput.addEventListener('input', updateButtons);

// Add an event listener to the reset button
reset.addEventListener('click', () => {
    // Delay the call to updateButtons until after the form is reset
    setTimeout(updateButtons, 0);
});


// Call the function initially to set the initial state of the buttons
updateButtons();