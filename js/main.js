const activateAnimation = (route, containerId, loop = true, speed = 1) => {
    var animationOptions = {
        container: document.getElementById(containerId),
        path: route,
        renderer: 'svg',
        loop: loop,
        autoplay: true,
    };

    const animation = bodymovin.loadAnimation(animationOptions);

    animation.setSpeed(speed);
}

const Toast = Swal.mixin({
    toast: true,
    position: 'top-right',
    iconColor: 'white',
    customClass: {
        popup: 'colored-toast',
    },
    showConfirmButton: false,
    timer: 3500,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

const showErrorToast = (error) => {
    console.log(error);
    return Toast.fire({
        icon: "warning",
        title: "Error inesperado, intente nuevamente más tarde",
    });
}