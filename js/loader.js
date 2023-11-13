class Loader {
    constructor() {
        this.container = document.querySelector('.loader-container');
    }

    show() {
        this.container.classList.remove('hidden');
    }

    hide() {
        this.container.classList.add('hidden');
    }
}