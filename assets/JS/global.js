window.onload = function () {
    // Add 'animate' class to all elements except footer and script tags
    const elements = document.querySelectorAll('body > *:not(footer):not(script)');
    elements.forEach(element => element.classList.add('animate'));

    // Wait for fonts to load and add 'done' class to the loading element
    document.fonts.ready.then(() => {document.getElementById('loading').classList.add('done');
    }).catch(error => {console.error('Error: while loading fonts', error);});
    // Hide scroll button and header if page is scrolled to the top
    const scrollButton = document.querySelector(".scroll-top-button");
    const header = document.querySelector('header');
    let lastScrollTop = document.documentElement.scrollTop - 1;

    scrollButton.classList.remove('animate');
    header.classList.remove('animate');
    if (document.documentElement.scrollTop > 0) {header.classList.remove('hidden');}
    scrollButton.classList.add('hidden');
    // Show/hide header and scroll button based on scroll position
    window.addEventListener("scroll", function() {
        let scrollTop = document.documentElement.scrollTop;
        if (window.scrollY > 100) { 
            scrollButton.classList.remove('hidden');
        } else {
            scrollButton.classList.add('hidden');
            header.classList.remove('hidden');
        }

        if (scrollTop > lastScrollTop && scrollTop > 60) {header.classList.add('hidden');
        } else {header.classList.remove('hidden');}
        lastScrollTop = scrollTop;
    });
    // Scroll to top when scroll button is clicked
    scrollButton.addEventListener("click", function () {window.scrollTo({ top: 0, behavior: "smooth" });});
    // Handle theme switcher
    const handle = document.querySelector(".handle");
    const sliderElement = document.querySelector(".slider");
    let mode = localStorage.getItem('theme') || 'light-mode';

    applyTheme(mode === 'dark-mode');

    function applyTheme(isDark) {
        const theme = isDark ? "dark-mode" : "light-mode";
        document.body.className = theme;
        sliderElement.className = `slider ${theme}`;
        handle.className = `handle ${theme}`;
        localStorage.setItem('theme', theme);
    }

    // Handle theme switcher drag event
    let isDragged = false;
    let light_pos = 6;
    let dark_pos = 25;
    let center = (light_pos + dark_pos) / 2;
    if (!window.location.pathname.includes('Bad_Apple.php')){
        handle.addEventListener("mousedown", function (event) {
            event.stopPropagation();
            const startX = event.clientX;
            const startLeft = handle.offsetLeft;

            function moveHandle(event) {
                let newLeft = Math.min(Math.max(startLeft + event.clientX - startX, light_pos - 2), dark_pos+2);
                handle.style.left = newLeft + "px";
                isDragged = true;
                if (newLeft >= center+4) {applyTheme(true);
                } else if (newLeft <= center-3){applyTheme(false);}
            }

            function releaseHandle() {
                document.removeEventListener("mousemove", moveHandle);
                document.removeEventListener("mouseup", releaseHandle);

                setTimeout(function () {
                    const left = parseInt(handle.style.left);
                    const isDark = left >= center;
                    applyTheme(isDark);

                    handle.style.left = isDark ? dark_pos + "px" : light_pos + "px";
                    isDragged = false;
                }, 0);
            }

            document.addEventListener("mousemove", moveHandle);
            document.addEventListener("mouseup", releaseHandle);
        });

        // Handle theme switcher click event
        handle.addEventListener("click", function (e) {
            if (!isDragged) {
                const isDark = handle.offsetLeft >= center;
                handle.style.left = isDark ? light_pos + "px" : dark_pos + "px";
                applyTheme(!isDark);
            }
        });

        // Handle theme switcher slider click event
        sliderElement.addEventListener("click", function (e) {
            const isDark = handle.offsetLeft >= center;
            handle.style.left = isDark ? light_pos + "px" : dark_pos + "px";
            applyTheme(!isDark);
        });
    } else {
        // Apply dark mode and disable theme switcher for Bad_Apple.php page
        applyTheme(true);
        sliderElement.style.cursor = "not-allowed";
        sliderElement.childNodes.forEach(child => child.style.cursor = "not-allowed");
        handle.style.cursor = "not-allowed";
        handle.style.pointerEvents = "none";
    }
};
// Register service worker for offline support
if ('serviceWorker' in navigator) {
    window.addEventListener('load', function () {
        navigator.serviceWorker.register('assets/JS/service-worker.js').then(function (registration) {
            console.log('ServiceWorker registration successful with scope: ', registration.scope);
        }, function (err) {
            console.log('ServiceWorker registration failed: ', err);
        });
    });
}
try {
// Handle login button click event
document.querySelector('button[type="login"]').addEventListener('click', function (event) {
    event.preventDefault();
    if (sessionStorage.getItem('loggedIn') === 'true') {
        window.location.href = 'account.php';
    } else {
        window.location.href = 'login.php';
    }
});}
catch (e) {}
// Set current year in the element with id 'year'
document.getElementById('year').textContent = new Date().getFullYear();

window.addEventListener('beforeunload', function() {
    // Set callback to current page URL
    sessionStorage.setItem('callback', window.location.href);
});