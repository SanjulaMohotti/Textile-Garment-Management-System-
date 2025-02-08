document.addEventListener('DOMContentLoaded', function () {
    const closeButtons = document.querySelectorAll('.icon-close');

    closeButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const formBox = this.closest('.form-box');
            formBox.style.display = 'none';
        });
    });
});