document.getElementById('show-register').addEventListener('click', function (e) {
    e.preventDefault();
    document.getElementById('login-container').classList.remove('active');
    document.getElementById('register-container').classList.add('active');
});

document.getElementById('show-login').addEventListener('click', function (e) {
    e.preventDefault();
    document.getElementById('register-container').classList.remove('active');
    document.getElementById('login-container').classList.add('active');
});

// Initialize with login form visible
document.getElementById('login-container').classList.add('active');
 // captcha.js
 document.addEventListener('DOMContentLoaded', () => {
    generateCaptcha();

    // Function to generate a random CAPTCHA
    function generateCaptcha() {
        const captchaText = generateRandomString(6);
        const captchaElement = document.getElementById('captcha');
        captchaElement.textContent = captchaText;
        captchaElement.dataset.value = captchaText;
    }

    // Function to generate a random string of a given length
    function generateRandomString(length) {
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        let result = '';
        for (let i = 0; i < length; i++) {
            const randomIndex = Math.floor(Math.random() * characters.length);
            result += characters[randomIndex];
        }
        return result;
    }

    // Function to validate CAPTCHA
    window.validateCaptcha = function () {
        const captchaInput = document.getElementById('captcha-input').value;
        const captchaValue = document.getElementById('captcha').dataset.value;
        const messageElement = document.getElementById('captcha-message');

        if (captchaInput === captchaValue) {
            messageElement.textContent = 'CAPTCHA Validated!';
            messageElement.style.color = 'green';
        } else {
            messageElement.textContent = 'Incorrect CAPTCHA. Try again.';
            messageElement.style.color = 'red';
        }
    };
});


