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

    $(function () {
        var handle = $(".handle");
        var sliderElement = $(".slider");

        // Retrieve the theme from local storage
        var theme = localStorage.getItem('theme');
        if (theme) {
            document.body.className = theme;
            sliderElement.addClass(theme);
            handle.addClass(theme);
            handle.css('left', theme === 'dark-mode' ? '30px' : '4px');
        } else {
            document.body.className = 'light-mode';
            sliderElement.addClass('light-mode');
            handle.addClass('light-mode');
            handle.css('left', '4px');
        }

        handle.draggable({
            containment: "parent",
            axis: "x",
            start: function (event) {
                event.stopPropagation();
            },
            drag: function (event, ui) {
                if (ui.position.left < 4) {
                    ui.position.left = 4;
                }
                if (ui.position.left > 30) {
                    ui.position.left = 30;
                }
            },
            stop: function () {
                var left = handle.position().left;
                if (left >= 15) {
                    document.body.className = 'dark-mode';
                    sliderElement.attr('class', 'slider dark-mode');
                    handle.attr('class', 'handle dark-mode');
                    handle.animate({ left: "30px" }, 200);
                    localStorage.setItem('theme', 'dark-mode');
                } else {
                    document.body.className = 'light-mode';
                    sliderElement.attr('class', 'slider light-mode');
                    handle.attr('class', 'handle light-mode');
                    handle.animate({ left: "4px" }, 200);
                    localStorage.setItem('theme', 'light-mode');
                }
            }
        });

        $(".switch, .handle").click(function (e) {
            e.stopPropagation();
            var left = handle.position().left;
            if (left >= 15) {
                document.body.className = 'light-mode';
                sliderElement.attr('class', 'slider light-mode');
                handle.attr('class', 'handle light-mode');
                handle.animate({ left: "4px" }, 200);
                localStorage.setItem('theme', 'light-mode');
            } else {
                document.body.className = 'dark-mode';
                sliderElement.attr('class', 'slider dark-mode');
                handle.attr('class', 'handle dark-mode');
                handle.animate({ left: "30px" }, 200);
                localStorage.setItem('theme', 'dark-mode');
            }
        });
    });
};




// Auto update the year in the footer
document.getElementById('year').textContent = new Date().getFullYear();
