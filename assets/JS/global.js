window.onload = function () {
    // Select all the elements you want to animate
    const elements = document.querySelectorAll('body > *:not(footer)');

    // Add the animate class to these elements
    elements.forEach(element => {
        element.classList.add('animate');
    });

    // Load the fonts and then update the body opacity
    Promise.all([document.fonts.ready]).then(() => {
        document.body.style.opacity = "1";
    });
};


function updateFooter() {
    // update the footer to use a - instead of a | when the screen width is too small
    const footer = document.querySelector('footer');
    if (window.innerWidth <= 650) {
        footer.innerHTML = footer.innerHTML.replace(/&nbsp;\|&nbsp;/g, '&nbsp;-&nbsp;');
    } else {
        footer.innerHTML = footer.innerHTML.replace(/&nbsp;-&nbsp;/g, '&nbsp;|&nbsp;');
    }
}   