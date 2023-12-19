const create = async (e) => {
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

        const form = document.getElementById('book_form');        

        const formData = new FormData(form);

        const response = await fetch('./books.php?action=create',
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
                title: "¡Perfecto! Libro agregado correctamente.",
            });
    
            setTimeout(() => {
                window.location.replace('./dashboard.php');
            }, 1000);
        }, 2000);
    } catch (error) {
        loader.hide();
        showErrorToast(error);
    }
}

const validateFields = () => {
    const fieldsToValidate = {
        cover_image: { required: true },
        hero_image: { required: true },
        title: { required: true },
        resume: { required: true },
        description: { required: true },
        price: { required: true },
    };

    let formValidated = true;

    for (const fieldName in fieldsToValidate) {
        const fieldConfig = fieldsToValidate[fieldName];
        const field = document.getElementById('book_' + fieldName);

        const errorBox = field.parentNode.querySelector('.error-message');
        
        if (fieldConfig.required && field.value.trim() === '') {
            formValidated = false;
            errorBox.innerHTML = `El campo no puede ser vacío`;
            field.classList.add('error');
        } else {
            errorBox.innerHTML = "";
            field.classList.add('success');
        }
    }

    return formValidated;
};
