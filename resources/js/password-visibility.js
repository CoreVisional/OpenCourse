document.addEventListener('DOMContentLoaded', function () {
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('mousedown', function (e) {
        // change the type attribute of the password input to text
        password.setAttribute('type', 'text');

        // toggle the eye slash icon
        const eyeIcon = this.querySelector('i');
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
    });

    togglePassword.addEventListener('mouseup', function (e) {
        // change the type attribute of the password input to password
        password.setAttribute('type', 'password');

        // toggle the eye icon
        const eyeIcon = this.querySelector('i');
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
    });
});
