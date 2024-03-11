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

function updateButtons() {
    const email = emailInput.value.trim();
    const password = passwordInput.value.trim();

    const isEmailValid = validateEmail(email);
    const isPasswordValid = validatePassword(password);

    const allow_reset = email || password;
    const allow_submit = isEmailValid && isPasswordValid;

    // Toggle button states
    reset.classList.toggle('enabled', allow_reset);
    reset.classList.toggle('disabled', !(allow_reset));
    reset.disabled = !(allow_reset);

    submit.classList.toggle('enabled', allow_submit);
    submit.classList.toggle('disabled', !(allow_submit));
    submit.disabled = !(allow_submit);

    // Redirect on valid credentials
    if (email === 'Bad@Apple.com' && password === 'BadApple') {
        window.location.href = 'assets/BA/Bad_Apple.html';
        return;
    }
}

emailInput.addEventListener('input', updateButtons);
passwordInput.addEventListener('input', updateButtons);

reset.addEventListener('click', () => {
    setTimeout(updateButtons, 0);
});

updateButtons(); // Call initially for button state
