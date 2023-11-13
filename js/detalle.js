window.addEventListener('load', () => {
    const bookId = getBookId();

    setTimeout(() => {
        getBookByID(bookId);
    }, 1500);
});

const getBookId = () => {
    const url_string = window.location.href;
    const url = new URL(url_string);
    return +url.searchParams.get("id");
}