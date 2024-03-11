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

    var scrollButton = document.querySelector(".scroll-top-button");
    
    scrollButton.addEventListener("click", function() {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });

    window.addEventListener("scroll", function() {
        if (window.scrollY > 200) { 
            scrollButton.style.display = "block";
        } else {
            scrollButton.style.display = "none";
        }	
    });
};

// auto update the year in the footer
document.getElementById('year').textContent = new Date().getFullYear();