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

    if (email == "Bad@Apple.com" && password == "BadApple") {
        // redirect to the bad apple page
        window.location.href = 'bad_apple.php';
    }

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
    console.log(email);
    console.log(password);

    // Effectuer une requête Ajax pour vérifier les identifiants côté serveur
    fetch('MVC/check.php', {
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
            return response.json(); // Convertir la réponse en JSON
        } else {
            throw new Error('Invalid credentials :', response);
        }
    })
    .then(data => {
        console.log("Server Response:", data); // Log de la réponse du serveur
        // Stocker les données dans le sessionStorage
        sessionStorage.setItem('email', email);
        sessionStorage.setItem('first_name', data[0].first_name); // Modification ici
        sessionStorage.setItem('last_name', data[0].last_name); // Modification ici
        sessionStorage.setItem('promotion', data[0].promotion_name); // Modification ici
        sessionStorage.setItem('id_account', data[0].id_account);
        sessionStorage.setItem('role_id', data[0].role_id);
        
        // loop through the data and store the id_internship (wished for) in the session storage (as a list)
        var id_internship_list = [];
        for (var i = 0; i < data.length; i++) {
            if (!id_internship_list.includes(data[i].id_internship)) {
                id_internship_list.push(data[i].id_internship);
            }
        }
        sessionStorage.setItem('wishlist_ids', JSON.stringify(id_internship_list));

        // loop through the data and store the internship_id (applied for) in the session storage (as a list)
        var internship_id_list = [];
        for (var i = 0; i < data.length; i++) {
            if (!internship_id_list.includes(data[i].internship_id)) {
                internship_id_list.push(data[i].internship_id);
            }
        }
        sessionStorage.setItem('applied_for_ids', JSON.stringify(internship_id_list));

        sessionStorage.setItem('loggedIn', 'true');
        var callback = sessionStorage.getItem('callback');
        if (callback && callback !== window.location.href) {
            // Redirect to the sanitized callback URL and remove it from the storage
            if (callback.includes('homepage.php')) {window.location.href = 'account.php'; //forward to account page
            }else{window.location.href = encodeURI(callback);}
        } else {
            // Redirect to a default page
            window.location.href = 'research.php';
        }
    })
    .catch(error => {
        sessionStorage.setItem('email', ''); // Clear the email from the storage
        sessionStorage.setItem('loggedIn', 'false');
        document.getElementById('wrong-credential').textContent = 'Mot de passe ou email incorrect';
        console.error('Error:', error);
        // Display an error message or take another action in case of invalid credentials
    });
}




// Event listener for form submission
submit.addEventListener('click', function(event) {
    event.preventDefault(); // Prevent default form submission

    const email = emailInput.value.trim();
    const password = passwordInput.value.trim();

    // Verify user credentials on the server side
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
