// Function to validate first name
function validateFirstName() {
    var firstNameInput = document.getElementById('firstName');
    var firstNameValue = firstNameInput.value.trim();
    var firstNameError = document.getElementById('firstName-error');

    if (!/^[A-Za-z]+$/.test(firstNameValue)) {
        firstNameInput.classList.add('is-invalid');
        firstNameError.textContent = "First name should contain only alphabets";
    } else {
        firstNameInput.classList.remove('is-invalid');
        firstNameError.textContent = "";
    }
}

// Function to validate last name
function validateLastName() {
    var lastNameInput = document.getElementById('lastName');
    var lastNameValue = lastNameInput.value.trim();
    var lastNameError = document.getElementById('lastName-error');

    if (!/^[A-Za-z]+$/.test(lastNameValue)) {
        lastNameInput.classList.add('is-invalid');
        lastNameError.textContent = "Last name should contain only alphabets";
    } else {
        lastNameInput.classList.remove('is-invalid');
        lastNameError.textContent = "";
    }
}

// Function to validate ID number
function validateIdNumber() {
    var idNumberInput = document.getElementById('idNumber');
    var idNumberValue = idNumberInput.value.trim();
    var idNumberError = document.getElementById('idNumber-error');

    if (idNumberValue.length !== 8) {
        idNumberInput.classList.add('is-invalid');
        idNumberError.textContent = "ID number must be 8 characters long";
    } else {
        idNumberInput.classList.remove('is-invalid');
        idNumberError.textContent = "";
    }
}

// Function to validate email
function validateEmail() {
    var emailInput = document.getElementById('email');
    var emailValue = emailInput.value.trim();
    var emailError = document.getElementById('email-error');

    if (!emailValue.endsWith("@ashesi.edu.gh")) {
        emailInput.classList.add('is-invalid');
        emailError.textContent = "Email must end with @ashesi.edu.gh";
    } else {
        emailInput.classList.remove('is-invalid');
        emailError.textContent = "";
    }
}

// Function to validate password
function validatePassword() {
    var passwordInput = document.getElementById('password');
    var passwordValue = passwordInput.value.trim();
    var passwordError = document.getElementById('password-error');

    if (passwordValue.length < 8) {
        passwordInput.classList.add('is-invalid');
        passwordError.textContent = "Password must be at least 8 characters long";
    } else if (!/[a-z]/.test(passwordValue) || !/[A-Z]/.test(passwordValue) || !/\d/.test(passwordValue)) {
        passwordInput.classList.add('is-invalid');
        passwordError.textContent = "Password must contain at least one lowercase letter, one uppercase letter, and one number";
    } else if (/password/i.test(passwordValue)) {
        passwordInput.classList.add('is-invalid');
        passwordError.textContent = "Avoid using common phrases or dictionary words in your password";
    } else {
        passwordInput.classList.remove('is-invalid');
        passwordError.textContent = "";
    }
}

// Function to validate retype password
function validateRetypePassword() {
    var passwordInput = document.getElementById('password');
    var retypePasswordInput = document.getElementById('retypePassword');
    var retypePasswordValue = retypePasswordInput.value.trim();
    var retypePasswordError = document.getElementById('retypePassword-error');

    if (passwordInput.value !== retypePasswordValue) {
        retypePasswordInput.classList.add('is-invalid');
        retypePasswordError.textContent = "Passwords entered do not match";
    } else {
        retypePasswordInput.classList.remove('is-invalid');
        retypePasswordError.textContent = "";
    }
}

// Function to validate phone number
function validatePhoneNumber() {
    var phoneNumberInput = document.getElementById('phoneNumber');
    var phoneNumberValue = phoneNumberInput.value.trim();
    var phoneNumberError = document.getElementById('phoneNumber-error');

    // Validation logic for phone number (Any valid phone number)
    if (!/^\+?\d{1,}$/.test(phoneNumberValue)) {
        phoneNumberInput.classList.add('is-invalid');
        phoneNumberError.textContent = "Must be a valid phone number";
    } else {
        phoneNumberInput.classList.remove('is-invalid');
        phoneNumberError.textContent = "";
    }
}

// Function to append error message to the error container
function appendErrorMessage(message) {
    var errorContainer = document.getElementById('error-messages');
    var errorMessage = document.createElement('p');
    errorMessage.textContent = message;
    errorContainer.appendChild(errorMessage);
}

// Attach event listeners to input fields for real-time validation
document.addEventListener("DOMContentLoaded", function() {
    var firstNameInput = document.getElementById('firstName');
    var lastNameInput = document.getElementById('lastName');
    var phoneNumberInput = document.getElementById('phoneNumber');
    var idNumberInput = document.getElementById('idNumber');
    var emailInput = document.getElementById('email');
    var passwordInput = document.getElementById('password');
    var retypePasswordInput = document.getElementById('retypePassword');

    firstNameInput.addEventListener("input", validateFirstName);
    lastNameInput.addEventListener("input", validateLastName);
    idNumberInput.addEventListener("input", validateIdNumber);
    emailInput.addEventListener("input", validateEmail);
    passwordInput.addEventListener("input", validatePassword);
    retypePasswordInput.addEventListener("input", validateRetypePassword);
    phoneNumberInput.addEventListener("input", validatePhoneNumber);
});

function validateForm() {
    var firstNameInput = document.getElementById('firstName');
    var lastNameInput = document.getElementById('lastName');
    var idNumberInput = document.getElementById('idNumber');
    var phoneNumberInput = document.getElementById('phoneNumber');
    var emailInput = document.getElementById('email');
    var passwordInput = document.getElementById('password');
    var retypePasswordInput = document.getElementById('retypePassword');
    var errorContainer = document.getElementById('error-messages');

    // Clear previous error messages
    errorContainer.innerHTML = '';

    // Perform individual field validations
    validateFirstName();
    validateLastName();
    validateIdNumber();
    validateEmail();
    validatePassword();
    validateRetypePassword();
    validatePhoneNumber();

    // Check if any field is empty
    if (firstNameInput.value.trim() === '') {
        appendErrorMessage("Please enter your first name.");
    }
    if (lastNameInput.value.trim() === '') {
        appendErrorMessage("Please enter your last name.");
    }
    if (idNumberInput.value.trim() === '') {
        appendErrorMessage("Please enter your ID number.");
    }
    if (phoneNumberInput.value.trim() === '') {
        appendErrorMessage("Please enter your phone number.");
    }
    if (emailInput.value.trim() === '') {
        appendErrorMessage("Please enter your email.");
    }
    if (passwordInput.value.trim() === '') {
        appendErrorMessage("Please enter a password.");
    }
    if (retypePasswordInput.value.trim() === '') {
        appendErrorMessage("Please retype your password.");
    }

    // Check if any field is invalid
    if (firstNameInput.classList.contains('is-invalid') ||
        lastNameInput.classList.contains('is-invalid') ||
        idNumberInput.classList.contains('is-invalid') ||
        phoneNumberInput.classList.contains('is-invalid') ||
        emailInput.classList.contains('is-invalid') ||
        passwordInput.classList.contains('is-invalid') ||
        retypePasswordInput.classList.contains('is-invalid')) {
        return false; // Form submission prevented
    }

    // All fields are valid, allow form submission
    return true;
}