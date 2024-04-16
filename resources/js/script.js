const passwordSections = document.querySelectorAll('.password-section');
const selectStore = document.querySelector('#selectStore')

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

if (selectStore) {
    selectStore.addEventListener('change', function () {
        return new Promise((resolve, reject) => {
            try {
                fetch(window.location.origin + `/admin/store/?api&select=${this.value}`)
                    .then(response => response.json())
                    .then(data => {
                        window.location.reload(); // Refresh page with exactly the same URL (including queries and endpoint)
                        resolve();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        reject(error);
                    });
            } catch (error) {
                console.error('Error:', error);
                reject(error);
            }
        });
    });
}
