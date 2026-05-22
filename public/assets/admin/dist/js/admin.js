// Sport Store Admin Panel - JS

document.addEventListener('DOMContentLoaded', function () {

    // Highlight active menu item based on current URL
    const currentPath = window.location.pathname;
    document.querySelectorAll('.menu-item a').forEach(function (link) {
        if (link.getAttribute('href') === currentPath) {
            link.closest('.menu-item').classList.add('active');
        }
    });

    // Simple stats counter animation
    document.querySelectorAll('.stat-info h3').forEach(function (el) {
        const target = parseInt(el.textContent.replace(/\D/g, ''), 10);
        if (isNaN(target)) return;
        let count = 0;
        const step = Math.ceil(target / 40);
        const timer = setInterval(function () {
            count += step;
            if (count >= target) { count = target; clearInterval(timer); }
            el.textContent = count.toLocaleString();
        }, 30);
    });

});
