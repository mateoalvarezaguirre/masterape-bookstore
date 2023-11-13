window.addEventListener('load', () => {
    getFeaturedBooksForHome(6);

    const bannerAnimationBox = document.getElementById('home_header_animation');

    bannerAnimationBox.classList.add('active');

    activateAnimation('./images/animations/home_animation.json', 'home_header_animation', false, 1.2);
    activateAnimation('./images/animations/contact_animation.json', 'home_contact_animation', true, 0.5);
});

const contact = async (e) => {
    try {
        e.preventDefault();

        const loader = new Loader;
        loader.show();

        setTimeout(() => {
            loader.hide();

            const successPage = document.getElementById('contact-success');
            const contactForm = document.getElementById('contact-form');
    
            contactForm.classList.add('sent');
            successPage.classList.add('active');
        }, 1500);


    } catch (error) {
        showErrorToast(error);
    }
}