/**
By: Ikhide Mohammed
     Filename: Signup-Validation.js
     Created: August 06, 2024
     Description: Javascript for Registration.html
*/

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('form');
    const emailInput = document.getElementById('email');
    const unameInput = document.getElementById('uname');
    const pwordInput = document.getElementById('pword');
    const repeatPwordInput = document.getElementById('repeat_pword');

    emailInput.addEventListener('input', validateEmail);
    unameInput.addEventListener('input', validateUname);
    pwordInput.addEventListener('input', validatePassword);
    repeatPwordInput.addEventListener('input', validateRepeatPassword);

    form.addEventListener('submit', function(event) {
        if (!validateForm()) {
            event.preventDefault();
            alert('Please fix the errors in the form.');
        }
    });

    function validateEmail() {
        const email = emailInput.value;
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            setError(emailInput, 'Email address should be non-empty with the format xyz@xyz.xyz.');
        } else {
            clearError(emailInput);
        }
    }

    function validateUname() {
        const uname = unameInput.value;
        if (uname === '' || uname.length > 20) {
            setError(unameInput, 'Username should be non-empty and within 20 characters long.');
        } else {
            clearError(unameInput);
        }
    }

    function validatePassword() {
        const pword = pwordInput.value;
        if (pword.length < 6) {
            setError(pwordInput, 'Password should be at least 6 characters long.');
        } else {
            clearError(pwordInput);
        }
    }

    function validateRepeatPassword() {
        const pword = pwordInput.value;
        const repeatPword = repeatPwordInput.value;
        if (pword !== repeatPword || repeatPword === '') {
            setError(repeatPwordInput, 'Passwords do not match.');
        } else {
            clearError(repeatPwordInput);
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
        validateEmail();
        validateUname();
        validatePassword();
        validateRepeatPassword();
        return document.querySelectorAll('.invalid').length === 0;
    }
});
