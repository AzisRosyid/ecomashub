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
const terima = document.querySelector('#terima');
const userStatusId = document.querySelector('#userStatusId');
const closeAccept = document.querySelector('#close-accept');
const acceptId = document.querySelector('#acceptId');
const tolak = document.querySelector('#tolak');
const closeReject = document.querySelector('#close-reject');
const rejectId = document.querySelector('#rejectId');
const pick = document.getElementById('pick');
const searchForm = document.getElementById('searchForm');
const detailItems = document.querySelectorAll('.detail-item');
const acceptUsers = document.querySelectorAll('.accept-user');
const rejectUsers = document.querySelectorAll('.reject-user');
const expenseTypes = document.querySelectorAll('.expense-type');
const intervalInput = document.querySelector('#interval');
const intervalTitle = document.querySelector('#intervalTitle');

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
if (filter != null) {
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

}

// hamburger
hamburger.addEventListener('click', function () {
    hamburger.classList.toggle('hamburger-active');
    navMenu.classList.toggle('hidden');
});

detailItems.forEach(function(element) {
    element.addEventListener('click', function() {
        if (userStatusId != null) {
            var value = element.getAttribute('value');
            userStatusId.setAttribute('value', value);
        }
        isiDetail.classList.remove('hidden');
        bgDetail.classList.remove('hidden');
    });
});

// Search
if (pick != null) {
    pick.addEventListener("change", function() {
        searchForm.submit();
    });
}

if (closeDetail != null) {
    closeDetail.addEventListener('click', function () {
        isiDetail.classList.add('hidden');
        bgDetail.classList.add('hidden');
    });

    bgDetail.addEventListener('click', function () {
        isiDetail.classList.add('hidden');
        bgDetail.classList.add('hidden');
    });
}

// User
acceptUsers.forEach(function(element) {
    element.addEventListener('click', function() {
        var value = element.getAttribute('value');
        acceptId.setAttribute('value', value);
        terima.classList.remove('hidden');
        bgDetail.classList.remove('hidden');
    });
});
if (closeAccept != null) {
    closeAccept.addEventListener('click', function () {
        terima.classList.add('hidden');
        bgDetail.classList.add('hidden');
    });
    bgDetail.addEventListener('click', function () {
        terima.classList.add('hidden');
        bgDetail.classList.add('hidden');
    });

}

// Tolak User
rejectUsers.forEach(function(element) {
    element.addEventListener('click', function() {
        var value = element.getAttribute('value');
        rejectId.setAttribute('value', value);
        tolak.classList.remove('hidden');
        bgDetail.classList.remove('hidden');
    });
});
if (closeReject != null) {
    closeReject.addEventListener('click', function () {
        tolak.classList.add('hidden');
        bgDetail.classList.add('hidden');
    });
    bgDetail.addEventListener('click', function () {
        tolak.classList.add('hidden');
        bgDetail.classList.add('hidden');
    });
}

// Expense
expenseTypes.forEach(function(element) {
    element.addEventListener('change', function() {
        const isRutin = element.value === 'Rutin';
        intervalInput.disabled = !isRutin;
        intervalInput.required = isRutin;
        intervalTitle.innerHTML = isRutin ? 'Interval (bulan)*' : 'interval (bulan)';
        intervalInput.value = null;
    });
});
