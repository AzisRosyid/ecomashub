const keuangan = document.querySelector('#keuangan');
const menuKeuangan = document.querySelector('#menuKeuangan');
const keuanganRight = document.querySelector('#keuanganRight');
const keuanganDown = document.querySelector('#keuanganDown');
const filter = document.querySelector('#filter');
const menuFilter = document.querySelector('#menuFilter');
const bgFilter = document.querySelector('#bgFilter');
const closeFilter = document.querySelector('#closeFilter');

// menu keuangan
keuangan.addEventListener('click', function () {
    menuKeuangan.classList.toggle('hidden');
    keuanganRight.classList.toggle('hidden');
    keuanganDown.classList.toggle('hidden');
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