// hamburger
const hamburger = document.querySelector('#hamburger');
const navMenu = document.querySelector('#nav-menu');
const visiLink = document.getElementById('visi-link');
const visiLine = document.getElementById('visi-line');
const visiContent = document.getElementById('visi-content');
const misiLink = document.getElementById('misi-link');
const misiLine = document.getElementById('misi-line');
const misiContent = document.getElementById('misi-content');
const kegiatanLink = document.getElementById('kegiatan-link');
const kegiatanLine = document.getElementById('kegiatan-line');
const kegiatanContent = document.getElementById('kegiatan-content');
const produkLink = document.getElementById('produk-link');
const produkLine = document.getElementById('produk-line');
const produkContent = document.getElementById('produk-content');
const preview = document.getElementById('preview');
const next = document.getElementById('next');
const testimoni = document.getElementById('testimoni');
var arrayTestimoni = 0;
var isiTestimoni = document.getElementsByClassName('isiTestimoni');
const testimoniLeft = document.getElementById('testimoniLeft');
const testimoniRight = document.getElementById('testimoniRight');

hamburger.addEventListener('click', function () {
    hamburger.classList.toggle('hamburger-active');
    navMenu.classList.toggle('hidden');
});

//navbar fixed
window.onscroll = function () {
    const header = document.querySelector('header');
    const fixedNav = header.offsetTop;

    if (window.pageYOffset > fixedNav) {
        header.classList.add('navbar-fixed');
    } else {
        header.classList.remove('navbar-fixed');
    }
};

// navbar active
document.addEventListener("DOMContentLoaded", function () {
    const links = document.querySelectorAll(".block li");

    links.forEach(function (link) {
        link.addEventListener("click", function () {
            // Hapus kelas active dari semua link
            links.forEach(function (item) {
                const span = item.querySelector('span');
                if (span) {
                    span.classList.remove("lg:bg-green-700");
                }
            });

            // Pindahkan kelas active ke span
            const span = link.querySelector("span");
            if (span) {
                span.classList.add("lg:bg-green-700");
            }
        });
    });
});

// visi misi
visiLink.addEventListener('click', function (event) {
    event.preventDefault();

    visiLink.classList.add('text-green-600');
    visiLink.classList.remove('text-slate-400');
    visiContent.classList.remove('hidden');
    visiLine.classList.add('bg-green-600');
    visiLine.classList.remove('bg-slate-400');

    misiLink.classList.remove('text-green-600');
    misiLink.classList.add('text-slate-400');
    misiContent.classList.add('hidden');
    misiLine.classList.remove('bg-green-600');
    misiLine.classList.add('bg-slate-400');
});

misiLink.addEventListener('click', function (event) {
    event.preventDefault();

    misiLink.classList.add('text-green-600');
    misiLink.classList.remove('text-slate-400');
    misiContent.classList.remove('hidden');
    misiLine.classList.add('bg-green-600');
    misiLine.classList.remove('bg-slate-400');

    visiLink.classList.remove('text-green-600');
    visiLink.classList.add('text-slate-400');
    visiContent.classList.add('hidden');
    visiLine.classList.remove('bg-green-600');
    visiLine.classList.add('bg-slate-400');
});

//kegiatan produk
kegiatanLink.addEventListener('click', function (event) {
    event.preventDefault();

    kegiatanLink.classList.add('text-green-600');
    kegiatanLink.classList.remove('text-slate-400');
    kegiatanContent.classList.remove('hidden');
    kegiatanLine.classList.add('bg-green-600');
    kegiatanLine.classList.remove('bg-slate-400');

    produkLink.classList.remove('text-green-600');
    produkLink.classList.add('text-slate-400');
    produkContent.classList.add('hidden');
    produkLine.classList.remove('bg-green-600');
    produkLine.classList.add('bg-slate-400');
});

produkLink.addEventListener('click', function (event) {
    event.preventDefault();

    produkLink.classList.add('text-green-600');
    produkLink.classList.remove('text-slate-400');
    produkContent.classList.remove('hidden');
    produkLine.classList.add('bg-green-600');
    produkLine.classList.remove('bg-slate-400');

    kegiatanLink.classList.remove('text-green-600');
    kegiatanLink.classList.add('text-slate-400');
    kegiatanContent.classList.add('hidden');
    kegiatanLine.classList.remove('bg-green-600');
    kegiatanLine.classList.add('bg-slate-400');
});

//testimoni
preview.addEventListener('click', function (event) {
    event.preventDefault();
    if (arrayTestimoni > 0) {
        isiTestimoni[arrayTestimoni].classList.add('hidden');
        arrayTestimoni--;
        if (arrayTestimoni < 0) {
            arrayTestimoni = 0;
        }
        isiTestimoni[arrayTestimoni].classList.remove('hidden');
    }

    if (arrayTestimoni > 0) {
        // Ubah warna fill
        testimoniLeft.querySelectorAll('path').forEach(function (path) {
            path.setAttribute('fill', '#359C40');
        });
    } else {
        // Ubah warna fill
        testimoniLeft.querySelectorAll('path').forEach(function (path) {
            path.setAttribute('fill', '#DFDFDF');
        });
    }

    if (arrayTestimoni < isiTestimoni.length - 1) {
        // Ubah warna fill
        testimoniRight.querySelectorAll('path').forEach(function (path) {
            path.setAttribute('fill', '#359C40');
        });
    } else {
        // Ubah warna fill
        testimoniRight.querySelectorAll('path').forEach(function (path) {
            path.setAttribute('fill', '#DFDFDF');
        });
    }
});

next.addEventListener('click', function (event) {
    event.preventDefault();
    if (arrayTestimoni < isiTestimoni.length - 1) {
        isiTestimoni[arrayTestimoni].classList.add('hidden');
        arrayTestimoni++;
        if (arrayTestimoni > isiTestimoni.length - 1) {
            arrayTestimoni = isiTestimoni.length - 1;
        }
        isiTestimoni[arrayTestimoni].classList.remove('hidden');
    }

    if (arrayTestimoni > 0) {
        // Ubah warna fill
        testimoniLeft.querySelectorAll('path').forEach(function (path) {
            path.setAttribute('fill', '#359C40');
        });
    } else {
        // Ubah warna fill
        testimoniLeft.querySelectorAll('path').forEach(function (path) {
            path.setAttribute('fill', '#DFDFDF');
        });
    }

    if (arrayTestimoni < isiTestimoni.length - 1) {
        // Ubah warna fill
        testimoniRight.querySelectorAll('path').forEach(function (path) {
            path.setAttribute('fill', '#359C40');
        });
    } else {
        // Ubah warna fill
        testimoniRight.querySelectorAll('path').forEach(function (path) {
            path.setAttribute('fill', '#DFDFDF');
        });
    }
});

if (isiTestimoni.length == 1) {
    testimoniLeft.querySelectorAll('path').forEach(function (path) {
        path.setAttribute('fill', '#DFDFDF');
    });

    testimoniRight.querySelectorAll('path').forEach(function (path) {
        path.setAttribute('fill', '#DFDFDF');
    });
}
