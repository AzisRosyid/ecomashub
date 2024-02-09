const passwordSections = document.querySelectorAll('.password-section');

passwordSections.forEach(function (element) {
    const passwordInput = element.querySelector('.password-input');
    const showPassword = element.querySelector('.show-password');
    const hidePassword = element.querySelector('.hide-password');

    showPassword.addEventListener('click', function () {
        passwordInput.type = 'text';
        showPassword.classList.add('hidden');
        hidePassword.classList.remove('hidden');
    });

    hidePassword.addEventListener('click', function () {
        passwordInput.type = 'password';
        hidePassword.classList.add('hidden');
        showPassword.classList.remove('hidden');
    });
});

