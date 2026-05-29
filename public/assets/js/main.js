// Sport Store - Main JS

document.addEventListener('DOMContentLoaded', function () {

    // Dynamic product slider
    const slides = document.querySelectorAll('.slider');

    if (slides.length > 1) {
        let current = 0;

        slides.forEach(function (slide, i) {
            slide.style.transition = 'opacity 0.4s ease';
            if (i > 0) {
                slide.style.display = 'none';
                slide.style.opacity = '0';
            }
        });

        setInterval(function () {
            slides[current].style.opacity = '0';
            setTimeout(function () {
                slides[current].style.display = 'none';
                current = (current + 1) % slides.length;
                slides[current].style.display = 'block';
                setTimeout(function () {
                    slides[current].style.opacity = '1';
                }, 10);
            }, 400);
        }, 3500);
    }

    // Active nav link highlight
    const currentPath = window.location.pathname;
    document.querySelectorAll('.header nav a').forEach(function (link) {
        if (link.getAttribute('href') === currentPath) {
            link.style.color = '#f0a500';
        }
    });

});
