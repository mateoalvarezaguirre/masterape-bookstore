window.addEventListener('load', () => {
    if (window.innerWidth > 1010) {
        setCarouselDesktop();
    } else {
        setCarouselMobile();
    }
});

const setCarouselDesktop = () => {
    const swiper = new Swiper('.swiper-container', {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        coverflowEffect: {
            rotate: 0,
            stretch: 420,
            depth: 100,
            modifier: 1,
            scale: .8,
            slideShadows: false,
        },
        loop: true,
        autoplay: {
            delay: 4500,
            disableOnInteraction: false,
        },
    });
}

const setCarouselMobile = () => {
    const swiper = new Swiper('.swiper-container', {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        coverflowEffect: {
            rotate: 0,
            stretch: 20,
            depth: 100,
            modifier: 1,
            scale: .8,
            slideShadows: false,
        },
        loop: true,
    });
}
