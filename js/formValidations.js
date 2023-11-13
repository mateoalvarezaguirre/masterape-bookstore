const validateUsername = async (e) => {
    try {
        e.target.classList.remove('success');
        e.target.classList.remove('error');

        const errorBox = e.target.parentNode.querySelector('.error-message');
    
        const usernameInput = document.getElementById("userName");
    
        const formData = new FormData;
    
        formData.append("username", usernameInput.value);
    
        const response = await fetch('./validate-user-name.php',
        {
            method: 'POST',
            body: formData,
        });

        const data = await response.json();
    
        if (response.status >= 300) {
            errorBox.innerHTML = "El nombre de usuario ingresado no está disponible";
            e.target.classList.add('error');
        } else {
            errorBox.innerHTML = "";
            e.target.classList.add('success');
        }
    } catch (error) {
        showErrorToast(error);
    }
}

const validateNotEmpty = (e) => {
    e.target.classList.remove('success');
    e.target.classList.remove('error');

    const errorBox = e.target.parentNode.querySelector('.error-message');

    const input = e.target;

    if (input.value === '') {
        errorBox.innerHTML = `El campo no puede ser vacío`;
        e.target.classList.add('error');
    } else {
        errorBox.innerHTML = "";
        e.target.classList.add('success');
    }
}

const validateEmail = (e) => {
    e.target.classList.remove('success');
    e.target.classList.remove('error');

    const errorBox = e.target.parentNode.querySelector('.error-message');

    const email = e.target.value;

    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    if (emailPattern.test(email)) {
        errorBox.innerHTML = "";
        e.target.classList.add('success');
    } else {
        errorBox.innerHTML = "Ingresa un correo electrónico válido";
        e.target.classList.add('error');
    }
}

const validatePasswordConfirmation = (e) => {
    e.target.classList.remove('success');
    e.target.classList.remove('error');

    const errorBox = e.target.parentNode.querySelector('.error-message');

    const password = document.getElementById('password').value;

    const passowrdConfirm = e.target.value;

    if (password !== passowrdConfirm) {
        errorBox.innerHTML = "Las contraseñas no coinciden";
        e.target.classList.add('error');
    } else {
        errorBox.innerHTML = "";
        e.target.classList.add('success');
    }
}

document.getElementById('userName')?.addEventListener('input', (e) => {
    validateNotEmpty(e);

    if (e.target.classList.contains('error')) {
        return;
    }
    validateUsername(e);
});

document.getElementById('email')?.addEventListener('input', (e) => {
    validateNotEmpty(e);

    if (e.target.classList.contains('error')) {
        return;
    }
    validateEmail(e);
});

document.getElementById('passwordConfirm')?.addEventListener('input', (e) => {
    validateNotEmpty(e);

    if (e.target.classList.contains('error')) {
        return;
    }
    validatePasswordConfirmation(e);
});