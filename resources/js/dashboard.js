const keuangan = document.querySelector('#keuangan');
const menuKeuangan = document.querySelector('#menuKeuangan');
const keuanganRight = document.querySelector('#keuanganRight');
const keuanganDown = document.querySelector('#keuanganDown');
const filter = document.querySelector('#filter');
const menuFilter = document.querySelector('#menuFilter');
const bgFilter = document.querySelector('#bgFilter');
const closeFilter = document.querySelector('#closeFilter');
const hamburger = document.querySelector('#hamburger');
const navMenu = document.querySelector('#nav-menu');
const echo = document.querySelector('#echo');
const menuEcho = document.querySelector('#menuEcho');
const echoRight = document.querySelector('#echoRight');
const echoDown = document.querySelector('#echoDown');

// menu keuangan
keuangan.addEventListener('click', function () {
    menuKeuangan.classList.toggle('hidden');
    keuanganRight.classList.toggle('hidden');
    keuanganDown.classList.toggle('hidden');
});

//menu echo
echo.addEventListener('click', function () {
    menuEcho.classList.toggle('hidden');
    echoRight.classList.toggle('hidden');
    echoDown.classList.toggle('hidden');
});

// hamburger
hamburger.addEventListener('click', function () {
    hamburger.classList.toggle('hamburger-active');
    navMenu.classList.toggle('hidden');
});