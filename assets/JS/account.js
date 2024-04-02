// Get the button element
const modifyButton = document.querySelector('.modify');

// Add event listener to the button
modifyButton.addEventListener('click', function() {
    // Toggle the text of the button
    if (modifyButton.textContent === 'Modifier vos informations') {
        modifyButton.textContent = 'Save';
        // Transform div elements to input elements
        const infoDivs = document.querySelectorAll('.info');
        infoDivs.forEach(div => {
            const element = document.createElement('input');
            if (div.tagName !== 'A') { // Check if the element is not a link
                element.value = div.textContent;
            } else {
                // create a file upload element
                element.type = 'file';
                element.name = 'file';
                // Store the old path in a data attribute
                element.dataset.oldPath = div.href;
            }
            element.classList.add('info'); // Add the "info" class to the input
            div.parentNode.replaceChild(element, div);
        });
        // Change the gap to 25px for the div with class .profile-info
        const profileInfoDiv = document.querySelector('.profile-info');
        profileInfoDiv.style.gap = '25px';
    } else {
        modifyButton.textContent = 'Modifier vos informations';
        // Transform input elements back to div elements
        const infoInputs = document.querySelectorAll('.info');
        infoInputs.forEach(input => {
            if (input.name === 'file') {
                // Create a link element
                const element = document.createElement('a');
                const filePath = input.files.length > 0 ? input.files[0].name : input.dataset.oldPath;
                const fileName = filePath.split('/').pop(); // Get the last part of the path
                element.href = filePath;
                element.target = '_blank';
                element.textContent = fileName; // Display only the last part of the path
                element.classList.add('info'); // Add the "info" class to the div
                input.parentNode.replaceChild(element, input);
            } else {
                const element = document.createElement('div');
                element.textContent = input.value;
                element.classList.add('info'); // Add the "info" class to the div
                input.parentNode.replaceChild(element, input);
            }
        });
        // Reset the gap for the div with class .profile-info
        const profileInfoDiv = document.querySelector('.profile-info');
        profileInfoDiv.style.gap = '';
    }
});