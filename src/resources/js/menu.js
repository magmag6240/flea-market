
const button = document.querySelector('#js-button');
const nav = document.querySelector('#js-nav');

button.addEventListener('click', function () {
    button.classList.toggle('active');
    nav.classList.toggle('active');
});