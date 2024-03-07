Promise.all([
    document.fonts.ready,
    new Promise((resolve) => window.onload = resolve)
]).then(() => {
    document.body.style.opacity = "1";
});