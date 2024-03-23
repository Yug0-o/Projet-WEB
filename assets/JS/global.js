window.onload = function () {
    const elements = document.querySelectorAll('body > *:not(footer)');
    elements.forEach(element => element.classList.add('animate'));

    document.fonts.ready.then(() => {
        document.getElementById('loading').classList.add('done');
    });

    const scrollButton = document.querySelector(".scroll-top-button");
    const header = document.querySelector('header');
    let lastScrollTop = document.documentElement.scrollTop - 1;

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
        window.scrollTo({ top: 0, behavior: "smooth" });
    });

    const handle = document.querySelector(".handle");
    const sliderElement = document.querySelector(".slider");
    const isDarkMode = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
    const isLightMode = window.matchMedia && window.matchMedia('(prefers-color-scheme: light)').matches;
    let mode = localStorage.getItem('theme') || (isDarkMode ? 'dark-mode' : isLightMode ? 'light-mode' : 'light-mode');

    applyTheme(mode === 'dark-mode');

    function applyTheme(isDark) {
        const theme = isDark ? "dark-mode" : "light-mode";
        document.body.className = theme;
        sliderElement.className = `slider ${theme}`;
        handle.className = `handle ${theme}`;
        localStorage.setItem('theme', theme);
    }

    let isDragged = false;

    handle.addEventListener("mousedown", function (event) {
        event.stopPropagation();
        const startX = event.clientX;
        const startLeft = handle.offsetLeft;

        function moveHandle(event) {
            let newLeft = Math.min(Math.max(startLeft + event.clientX - startX, 4), 30);
            handle.style.left = newLeft + "px";
            isDragged = true;
            if (newLeft >= 20) {
                applyTheme(true);
            } else if (newLeft <= 14){
                applyTheme(false);
            }
        }

        function releaseHandle() {
            document.removeEventListener("mousemove", moveHandle);
            document.removeEventListener("mouseup", releaseHandle);

            setTimeout(function () {
                const left = parseInt(handle.style.left);
                const isDark = left >= 17;
                applyTheme(isDark);

                handle.style.left = isDark ? "30px" : "4px";
                isDragged = false; // Reset the flag when the mouse is released
            }, 0);
        }

        document.addEventListener("mousemove", moveHandle);
        document.addEventListener("mouseup", releaseHandle);
    });

    handle.addEventListener("click", function (e) {
        if (!isDragged) { // Only handle the click event if the handle hasn't been dragged
            const isDark = handle.offsetLeft >= 17;
            handle.style.left = isDark ? "4px" : "30px";
            applyTheme(!isDark);
        }
    });

    sliderElement.addEventListener("click", function (e) {
        //get the current theme
        const isDark = handle.offsetLeft >= 17;
        handle.style.left = isDark ? "4px" : "30px";

        applyTheme(!isDark);
    });
    
};

document.getElementById('year').textContent = new Date().getFullYear();