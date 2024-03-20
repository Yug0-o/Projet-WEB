window.onload = function () {
    // Select all the elements you want to animate
    const elements = document.querySelectorAll('body > *:not(footer)');

    // Add the animate class to these elements
    elements.forEach(element => {
        element.classList.add('animate');
    });

    // Load the fonts and then update the body opacity
    Promise.all([document.fonts.ready]).then(() => {
        // opacity of loading screen to 0
        loading = document.getElementById('loading');
        loading.classList.add('done');
    });

    const scrollButton = document.querySelector(".scroll-top-button");
    let lastScrollTop = document.documentElement.scrollTop-1;
    const header = document.querySelector('header');

    scrollButton.classList.remove('animate');
    header.classList.remove('animate');
    if (window.pageYOffset || document.documentElement.scrollTop > 0) {
        header.classList.remove('hidden');
    }
    scrollButton.classList.add('hidden');

    window.addEventListener("scroll", function() {
        let scrollTop = document.documentElement.scrollTop;
        

        if (window.scrollY > 100) { 
            scrollButton.classList.remove('hidden');
        } else {
            scrollButton.classList.add('hidden');
            header.classList.remove('hidden');
        }

        if (scrollTop > lastScrollTop && scrollTop > 60) {
            header.classList.add('hidden');
        } else {
            header.classList.remove('hidden');
        }


        lastScrollTop = scrollTop;
    });

    scrollButton.addEventListener("click", function () {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });

    const themeButton = document.querySelector(".theme-toggle");

    themeButton.addEventListener("click", function () {
        // get the current theme using the button class (light-theme or dark-theme)
        const currentTheme = themeButton.classList.contains("light-theme") ? "light-theme" : "dark-theme";
        // toggle the theme class for the button and it's children
        themeButton.classList.toggle("light-theme");
        themeButton.classList.toggle("dark-theme");
        // it's children
        themeButton.children[0].classList.toggle("light-theme");
        themeButton.children[0].classList.toggle("dark-theme");
        // toggle the theme class for the body
        document.body.classList.toggle("dark-mode");
    });
};

// auto update the year in the footer
document.getElementById('year').textContent = new Date().getFullYear();
