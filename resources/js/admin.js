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
const bgDetail = document.querySelector('#bgDetail');
const isiDetail = document.querySelector('#isiDetail');
const closeDetail = document.querySelector('#closeDetail');
const echo = document.querySelector('#echo');
const menuEcho = document.querySelector('#menuEcho');
const echoRight = document.querySelector('#echoRight');
const echoDown = document.querySelector('#echoDown');
const pick = document.getElementById('pick');
const searchForm = document.getElementById('searchForm');

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

//filter
filter.addEventListener('click', function () {
    menuFilter.classList.remove('hidden');
    bgFilter.classList.remove('hidden');
});
closeFilter.addEventListener('click', function () {
    menuFilter.classList.add('hidden');
    bgFilter.classList.add('hidden');
});
bgFilter.addEventListener('click', function () {
    menuFilter.classList.add('hidden');
    bgFilter.classList.add('hidden');
});

// hamburger
hamburger.addEventListener('click', function () {
    hamburger.classList.toggle('hamburger-active');
    navMenu.classList.toggle('hidden');
});

//detail kegiatan
function detailKegiatan() {
    isiDetail.classList.remove('hidden');
    bgDetail.classList.remove('hidden');
}
closeDetail.addEventListener('click', function () {
    isiDetail.classList.add('hidden');
    bgDetail.classList.add('hidden');
});
bgDetail.addEventListener('click', function () {
    isiDetail.classList.add('hidden');
    bgDetail.classList.add('hidden');
});

// search
pick.addEventListener("change", function() {
    searchForm.submit();
});
