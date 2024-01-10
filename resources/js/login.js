const passwordInput = document.getElementById('passwordInput');
const tampilkanIcon = document.querySelector('.tampilkan');
const sembunyikanIcon = document.querySelector('.sembunyikan');

tampilkanIcon.addEventListener('click', function () {
    passwordInput.type = 'text';
    tampilkanIcon.classList.add('hidden');
    sembunyikanIcon.classList.remove('hidden');
});

sembunyikanIcon.addEventListener('click', function () {
    passwordInput.type = 'password';
    sembunyikanIcon.classList.add('hidden');
    tampilkanIcon.classList.remove('hidden');
});