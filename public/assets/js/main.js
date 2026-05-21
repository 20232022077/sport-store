// Sport Store - Main JS

document.addEventListener('DOMContentLoaded', function () {

    // Auto-rotate slider text
    const sliderMessages = [
        { title: 'Welcome to Sport Store', sub: 'Best sports equipment for every athlete' },
        { title: 'New Season Collection', sub: 'Discover the latest gear for 2025' },
        { title: 'Exclusive Offers', sub: 'Up to 40% off on selected items' },
    ];

    const sliderTitle = document.querySelector('.slider h2');
    const sliderSub   = document.querySelector('.slider p');

    if (sliderTitle && sliderSub) {
        let index = 0;
        setInterval(function () {
            index = (index + 1) % sliderMessages.length;
            sliderTitle.style.opacity = '0';
            sliderSub.style.opacity   = '0';
            setTimeout(function () {
                sliderTitle.textContent  = sliderMessages[index].title;
                sliderSub.textContent    = sliderMessages[index].sub;
                sliderTitle.style.opacity = '1';
                sliderSub.style.opacity   = '1';
            }, 300);
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
