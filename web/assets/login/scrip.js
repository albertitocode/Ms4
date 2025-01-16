const email = document.getElementById('user');
const emailError = document.getElementById('emailError');
    
    // Validación email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email.value)) {
        isValid = false;
    } else {
        emailError.style.display = 'none';
    }