/**
By: Ikhide Mohammed
     Filename: login-validation.js
     Created: August 06, 2024
     Description: Javascript for index.html
*/

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('form');
    const unameInput = document.getElementById('uname');
    const pwordInput = document.getElementById('pword');

    unameInput.addEventListener('input', validateUname);
    pwordInput.addEventListener('input', validatePassword);

    form.addEventListener('submit', function(event) {
        if (!validateForm()) {
            event.preventDefault();
            alert('Please enter your login information.');
        }
    });

    function validateUname() {
        const uname = unameInput.value;
        if (uname === '') {
            setError(unameInput, 'Username should be not be empty.');
        } else {
            clearError(unameInput);
        }
    }

    function validatePassword() {
        const pword = pwordInput.value;
        if (pword === '') {
            setError(pwordInput, 'Password should not be empty.');
        } else {
            clearError(pwordInput);
        }
    }

    function setError(element, message) {
        const parent = element.parentElement;
        parent.classList.add('invalid');
        let errorDisplay = parent.querySelector('.error');
        if (!errorDisplay) {
            errorDisplay = document.createElement('div');
            errorDisplay.className = 'error';
            parent.appendChild(errorDisplay);
        }
        errorDisplay.innerText = message;
    }

    function clearError(element) {
        const parent = element.parentElement;
        parent.classList.remove('invalid');
        const errorDisplay = parent.querySelector('.error');
        if (errorDisplay) {
            errorDisplay.remove();
        }
    }

    function validateForm() {
        validateUname();
        validatePassword();
        return document.querySelectorAll('.invalid').length === 0;
    }
});
