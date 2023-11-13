const makePagination = (paginationBox, paginationData) => {

    if (paginationData.current_page != 1) {
        paginationBox.innerHTML = paginationBox.innerHTML + 
        `<div class="pagination_arrow" onclick="getAllBooks(${paginationData.current_page - 1})">
            <i class="fa-solid fa-chevron-left"></i>
        </div>`;
    } else {
        paginationBox.innerHTML = paginationBox.innerHTML + 
        `<div class="pagination_arrow disabled">
            <i class="fa-solid fa-chevron-left"></i>
        </div>`;
    }

    for (let index = 1; index <= paginationData.last_page; index++) {
        if (index === +paginationData.current_page) {
            paginationBox.innerHTML = paginationBox.innerHTML + 
            `<div class="pagination_position active">${index}</div>`;
            continue;
        }
        
        paginationBox.innerHTML = paginationBox.innerHTML + 
            `<div class="pagination_position" onclick="getAllBooks(${index})">${index}</div>`;
    }

    if (paginationData.current_page != paginationData.last_page) {
        paginationBox.innerHTML = paginationBox.innerHTML + 
        `<div class="pagination_arrow" onclick="getAllBooks(${paginationData.current_page + 1})">
            <i class="fa-solid fa-chevron-right"></i>
        </div>`;
    } else {
        paginationBox.innerHTML = paginationBox.innerHTML + 
        `<div class="pagination_arrow disabled">
            <i class="fa-solid fa-chevron-right"></i>
        </div>`;
    }
}

