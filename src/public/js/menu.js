/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/menu.js ***!
  \******************************/
var button = document.querySelector('#js-button');
var nav = document.querySelector('#js-nav');
button.addEventListener('click', function () {
  button.classList.toggle('active');
  nav.classList.toggle('active');
});
/******/ })()
;