window.addEventListener('scroll', function () {

    if (window.innerWidth <= 600) {
        return;
    }

    const scrolled = window.pageYOffset || document.documentElement.scrollTop;

    if (scrolled) {
        return setScrolledNavbar();
    }
    return setUnscrolledNavbar();
});

const setUnscrolledNavbar = () => {
    const navbar = document.getElementsByTagName('nav')[0];
    const main = document.getElementsByTagName('main')[0];

    document.querySelector('.logo_image').setAttribute("src", "./images/logo_dark.svg");

    navbar.classList.remove('scrolled');
    main.classList.remove('scrolled');
}

const setScrolledNavbar = () => {
    const navbar = document.getElementsByTagName('nav')[0];
    const main = document.getElementsByTagName('main')[0];

    document.querySelector('.logo_image').setAttribute("src", "./images/logo_light.svg");

    const homeAnimation = document.getElementById('home_header_animation');

    if (homeAnimation) {
        homeAnimation.style.zIndex = 0;
    }

    navbar.classList.add('scrolled');
    main.classList.add('scrolled');
}

const showOrHideMenu = () => {
    const menu = document.querySelector('.nav_container.mobile .menu_box');

    if (menu.classList.contains('active')) {
        return menu.classList.remove('active');
    }

    menu.classList.add('active');
}