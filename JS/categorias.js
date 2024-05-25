document.querySelectorAll('.dropdown-item').forEach(item => {
    item.addEventListener('click', function(e) {
        e.preventDefault();
        const url = this.getAttribute('href');
        window.location.href = url;
    });
});
