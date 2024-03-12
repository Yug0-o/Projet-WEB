// Select the input fields and the buttons
const emailInput = document.querySelector('input[type="email"]');
const submit = document.querySelector('button[type="submit"]');
const emailSentDiv = document.querySelector('.email-sent');
const emailEntryDiv = document.querySelector('.email-entry');
const buttonDiv = document.querySelector('.password-recovery-form');

console.log("SKILL ISSUE")

// Make the email-sent div not visible initially
emailSentDiv.classList.add('hidden');
emailEntryDiv.classList.add('visible', 'animate');

//Check if the email is correct (contains @ and a dot)
function validateEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

// Function to enable or disable the buttons
function updateButtons() {
    const email = emailInput.value.trim();

    const isEmailValid = validateEmail(email);

    submit.classList.toggle('enabled', isEmailValid);
    submit.classList.toggle('animate', isEmailValid);

    submit.classList.toggle('disabled', !(isEmailValid));

    submit.disabled = !(isEmailValid);
}

// Add event listeners to the input fields
emailInput.addEventListener('input', updateButtons);

// Select the h4 element with the class 'garde'
const email_sent_to = document.querySelector('h4.email');

// Add event listener to the submit button
submit.addEventListener('click', function (event) {
    event.preventDefault(); // Prevent the form from being submitted
    emailEntryDiv.classList.replace('visible', 'hidden'); // Make the email-entry div not visible

    // Delay the visibility change of the email-sent div by 0.2 seconds
    setTimeout(function () {
        emailSentDiv.classList.remove('animate'); // Remove the animation class
        void emailSentDiv.offsetWidth; // Trigger a reflow, flushing the CSS changes
        emailSentDiv.classList.add('animate'); // Re-add the animation class
        
        emailSentDiv.classList.replace('hidden', 'visible'); // Make the email-sent div visible
        // Make the button div not accessible
        buttonDiv.style.pointerEvents = "none";

        // Add the email to the h4 element
        email_sent_to.textContent = emailInput.value.trim();
        email_sent_to.style.textDecoration = "underline";

    }, 200);
});

// Call the function initially to set the initial state of the buttons
updateButtons();