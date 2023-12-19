window.addEventListener('load', () => {
    activateAnimation('./images/animations/login_animation.json', 'login_animation', false);
});

const login = async (e) => {
    try {
        e.preventDefault();

        const loader = new Loader;
        loader.show();

        const emailInput = document.getElementById("email");
        const passwordInput = document.getElementById("password");

        const formData = new FormData;
        formData.append("email", emailInput.value);
        formData.append("password", passwordInput.value);

        const response = await fetch('./login.php',
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
                title: data.message,
            });
    
            setTimeout(() => {
                window.location.replace('./welcome.php');
            }, 1000);
        }, 2000);


        
    } catch (error) {
        showErrorToast(error);
    }
}