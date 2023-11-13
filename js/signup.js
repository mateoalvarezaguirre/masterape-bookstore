window.addEventListener('load', () => {
    activateAnimation('./images/animations/books_animation.json', 'signup_animation', false);
});

const signup = async (e) => {
    try {
        e.preventDefault();

        const fieldsValidated = validateFields();

        if (!fieldsValidated) {
            return Toast.fire({
                icon: "warning",
                title: "Hay campos con errores",
            });
        }

        const loader = new Loader;
        loader.show();

        const form = document.getElementById('signupForm');        

        const formData = new FormData(form);

        const response = await fetch('./signup.php',
        {
            method: 'POST',
            body: formData,
        });
        const data = await response.json();

        setTimeout(async () => {

            loader.hide();
    
            if (response.status >= 300) {
                return Toast.fire({
                    icon: "warning",
                    title: data.message ?? 'Ocurrió un error, intenta nuevamente más tarde',
                });
            }
    
            Toast.fire({
                icon: "success",
                title: "¡Perfecto!",
            });
    
            setTimeout(() => {
                window.location.replace('./');
            }, 1000);
        }, 2000);
    } catch (error) {
        showErrorToast(error);
    }
}

const validateFields = () => {
    const fieldsToValidate = {
        nombre: { required: true },
        apellido: { required: true },
        email: { required: true, pattern: /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/ },
        userName: { required: true },
        password: { required: true },
        passwordConfirm: { required: true },
    };

    for (const fieldName in fieldsToValidate) {
        const fieldConfig = fieldsToValidate[fieldName];
        const fieldValue = document.getElementById(fieldName).value;
        
        if (fieldConfig.required && fieldValue.trim() === '') {
            return false;
        }
        
        if (fieldConfig.pattern && !fieldConfig.pattern.test(fieldValue)) {
            return false;
        }
    }

    if (fieldsToValidate.password.required && fieldsToValidate.passwordConfirm.required) {
        const password = document.getElementById('password').value;
        const passwordConfirm = document.getElementById('passwordConfirm').value;

        if (password !== passwordConfirm) {
            return false;
        }
    }

    return true;
};
