const getAllBooks = async (page = 1, limit = 6) => {
    try {
        const booksBox = document.querySelector('.books_box');
        const paginationBox = document.querySelector('.pagination');
        booksBox.innerHTML = "";
        paginationBox.innerHTML = "";

        const response = await fetch(`./books.php?action=getAllBooks&page=${page}&limit=${limit}`);

        const data = await response.json();

        const booksFetched = data.books;

        for (let index = 0; index < booksFetched.length; index++) {
            booksBox.innerHTML = booksBox.innerHTML + getBookDiv(booksFetched[index])
        }

        if (data.paginate) {
            makePagination(paginationBox, data.paginate)
        }

    } catch (error) {
        console.error(error);
    }
}

const getBookByID = async (id) => {
    try {

        const formData = new FormData();

        formData.append('book_id', id);

        const response = await fetch(`./books.php?action=findBookByID`,{
            'method': 'POST',
            body: formData
        });
        const bookFetched = await response.json();
        const book = bookFetched.book;

        const bookBox = document.querySelector('.book_details_container');

        bookBox.innerHTML = getBookDetailDiv(book);

    } catch (error) {
        console.error(error);
    }
}

const getFeaturedBooks = async (limit = false) => {
    try {

        const limitQueryParam = limit ? `&limit=${limit}` : '';

        const response = await fetch(`./books.php?action=getFeaturedBooks${limitQueryParam}`);

        const booksFetched = await response.json();

        const featuredBooks = booksFetched.books;

        const booksBox = document.querySelector('.books_box');
        booksBox.innerHTML = "";

        const limitFor = limit ? limit : featuredBooks.length;

        for (let index = 0; index < limitFor; index++) {
            booksBox.innerHTML += getBookDiv(featuredBooks[index])
        }
    } catch (error) {
        console.error(error);
    }
}

const getFeaturedBooksForHome = async (limit = false) => {
    try {
        const limitQueryParam = limit ? `&limit=${limit}` : '';

        const response = await fetch(`./books.php?action=getFeaturedBooks${limitQueryParam}`);

        const booksFetched = await response.json();

        const featuredBooks = booksFetched.books;

        const booksBox = document.querySelector('.books_box');
        booksBox.innerHTML = "";

        const limitFor = limit ? limit : featuredBooks.length;

        for (let index = 0; index < limitFor; index++) {
            booksBox.innerHTML += getBookDivForHome(featuredBooks[index])
        }
    } catch (error) {
        console.error(error);
    }
}

const getCarouselBooks = async () => {
    try {
        const response = await fetch(`./books.php?action=getFeaturedBooks&limit=5`);
        const booksFetched = await response.json();

        const featuredBooks = booksFetched.books;

        const booksCarouselContainer = document.querySelector('.swiper-wrapper');
        booksCarouselContainer.innerHTML = '';

        for (let index = 0; index < 6; index++) {
            booksCarouselContainer.innerHTML += getBookCarouselSlide(featuredBooks[index]);
        }
    } catch (error) {
        console.error(error);
    }
}

const getBookDiv = (book) => {
    if (book === undefined) {
        return '';
    }

    const bookDiv = `<div class="book_box">
                        <div class="book_image">
                            <img src="./images/${book.cover_image}" alt="Imagen de la portada de ${book.title}.">
                            </div>
                        <div class="book_description">
                        <div class="book_title"><strong>${book.title}</strong></div>
                        ${book.resume}
                        <div class="book_buttons">
                        <a href="./detalle.php?id=${book.id}">
                        <div class="button buy_book_btn">Ver más</div>
                        </a>
                        </div>
                        </div>
                    </div>`;
    return bookDiv; 
}

const getBookDivForHome = (book) => {
    if (book === undefined) {
        return '';
    }

    const bookDiv = `<div class="book_box">
                        <div class="book_image">
                            <img src="./images/${book.cover_image}" alt="Imagen de la portada de ${book.title}.">
                            </div>
                        <div class="book_description">
                        <div class="book_title"><strong>${book.title}</strong></div>
                        ${book.resume}
                        <div class="book_buttons">
                        <a href="./detalle.php?id=${book.id}">
                        <div class="button buy_book_btn">Ver más</div>
                        </a>
                        </div>
                        </div>
                    </div>`;
    return bookDiv;
}

const getBookDetailDiv = (book) => {
    if (book === undefined) {
        return '';
    }

    const bookDiv = `
                    <div class="hero_banner" style="background-image: url('./images/${book.hero_image}')">
                        <div class="book_title desktop">
                            <h1>${book.title}</h1>
                        </div>
                    </div>
                    <div class="book_detail_image">
                        <img src="./images/${book.cover_image}" alt="Imagen de la portada de ${book.title}.">
                    </div>
                    <div class="book_detail">
                        <div class="book_detail_text">
                            <div class="book_title mobile">
                                <h1>${book.title}</h1>
                            </div>
                            <div class="description">${book.full_description}</div>
                            <div class="author">
                                Autor: <span class="author_name">${book.author}</span>
                            </div>
                            <div class="actions">
                                <div class="price">$ ${book.price}</div>
                                <div class="button buy_book_btn">Comprar</div>
                            </div>
                        </div>
                    </div>`;
    return bookDiv;
}

const getBookCarouselSlide = (book) => {
    if (book === undefined) {
        return '';
    }

    return  `<div class="swiper-slide">
                <div class="swiper_book">
                    <img src="./images/${book.cover_image}" alt="Imagen de la portada de ${book.title}.">
                </div>
            </div>`;
}