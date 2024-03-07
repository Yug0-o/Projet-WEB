Promise.all([
    document.fonts.ready,
    new Promise((resolve) => window.onload = resolve)
]).then(() => {
    document.body.style.opacity = "1";
    updateFooter();
    window.addEventListener('resize', updateFooter);
});

function updateFooter() {
    const footer = document.querySelector('footer');
    if (window.innerWidth <= 650) {
        footer.innerHTML = footer.innerHTML.replace(/&nbsp;\|&nbsp;/g, '&nbsp;-&nbsp;');
    } else {
        footer.innerHTML = footer.innerHTML.replace(/&nbsp;-&nbsp;/g, '&nbsp;|&nbsp;');
    }
}