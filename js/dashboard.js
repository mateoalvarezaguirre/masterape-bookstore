const edit = (id) => {
    changeActionButtons(id, 'save_and_cancel_button');

    const book_box = document.querySelector(`.book_dashboard_${id}`);

    const titleBox = book_box.querySelector('.book_title .value');
    const resumeBox = book_box.querySelector('.book_resume .value');
    const descriptionBox = book_box.querySelector('.book_description .value');
    const priceBox = book_box.querySelector('.book_price .value');

    const title = titleBox.innerText;
    const resume = resumeBox.innerText;
    const description = descriptionBox.innerText;
    const price = priceBox.innerText.replace('$ ', '');

    const originalValuesObject = {
        title,
        resume,
        description,
        price
    };

    book_box.querySelector('.original_data').value = JSON.stringify(originalValuesObject);

    for (const propName in originalValuesObject) {

        let inputElement;

        if (propName === 'resume' || propName === 'description') {
            inputElement = document.createElement('textarea');
            inputElement.innerHTML = originalValuesObject[propName].trim();
        } else {
            inputElement = document.createElement('input');
            inputElement.type = 'text';
            inputElement.value = originalValuesObject[propName].trim();
        }

        const formField = document.createElement('div');
        formField.className = 'form_field';
        formField.appendChild(inputElement);

        const valueBox = book_box.querySelector(`.book_${propName} .value`);
        valueBox.innerHTML = '';
        valueBox.appendChild(formField);
    }

}

const cancel = (id) => {
    changeActionButtons(id, 'edit_button');

    const book_box = document.querySelector(`.book_dashboard_${id}`);

    const originalData = JSON.parse(book_box.querySelector('.original_data').value);

    book_box.querySelector('.book_title .value').innerHTML = originalData.title;
    book_box.querySelector('.book_resume .value').innerHTML = originalData.resume;
    book_box.querySelector('.book_description .value').innerHTML = originalData.description;
    book_box.querySelector('.book_price .value').innerHTML = '$ ' + originalData.price;
}

const save = async (id) => {
    try {
        changeActionButtons(id, 'edit_button');

        const book_box = document.querySelector(`.book_dashboard_${id}`);

        const formData = new FormData();

        const title = book_box.querySelector('.book_title .value input');
        const resume = book_box.querySelector('.book_resume .value textarea');
        const description = book_box.querySelector('.book_description .value textarea');
        const price = book_box.querySelector('.book_price .value input');

        formData.append('book_id', id);
        formData.append('title', title.value);
        formData.append('resume', resume.value);
        formData.append('description', description.value);
        formData.append('price', price.value);

        const loader = new Loader;
        loader.show(); 

        const response = await fetch('./books.php?action=edit', {
            method: "POST",
            body: formData
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

            book_box.querySelector('.book_title .value').innerHTML = title.value;
            book_box.querySelector('.book_resume .value').innerHTML = resume.value;
            book_box.querySelector('.book_description .value').innerHTML = description.value
            book_box.querySelector('.book_price .value').innerHTML = '$ ' + price.value;
        }, 2000);

    } catch (error) {
        console.error(error);
    }
}


const changeActionButtons = (id, boxClass) => {
    document.querySelector(`.book_dashboard_${id} .action_box.active`).classList.remove('active');

    document.querySelector(`.book_dashboard_${id} .action_box.${boxClass}`).classList.add('active');
}