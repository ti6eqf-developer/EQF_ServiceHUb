const passwordInput = document.getElementById('password');
const togglePasswordButton = document.getElementById('togglePassword');

if (passwordInput && togglePasswordButton) {
    togglePasswordButton.addEventListener('click', () => {
        const isPasswordHidden = passwordInput.type === 'password';
        passwordInput.type = isPasswordHidden ? 'text' : 'password';
        togglePasswordButton.textContent = isPasswordHidden ? 'Hide' : 'Show';
    });
}