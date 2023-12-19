<?php
require_once('./includes/autoload.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include(BASE_URL . 'includes/layout/meta.php'); ?>
    <?php include(BASE_URL . 'includes/layout/css.php'); ?>
    <title>MasterApe - Sobre nosotros</title>
    <link rel="stylesheet" href="./css/create.css">
</head>

<body>
    <?php include(BASE_URL . 'includes/layout/loader.php'); ?>
    <?php include(BASE_URL . 'includes/layout/header.php'); ?>
    <main>
        <section id="create_new_book">
            <h1>Agregar Nuevo Libro</h1>
            <form id="book_form" enctype='multipart/form-data' method="post">
                <div class="data_box">
                    <label for="cover_image">
                        <h3>Cover:</h3>
                    </label>
                    <div class="form_field">
                        <input type="file" id="book_cover_image" name="book_cover_image" accept="image/*">
                        <div class="error-message"></div>
                    </div>
                </div>
                <div class="data_box">
                    <label for="hero_image">
                        <h3>Hero banner:</h3>
                    </label>
                    <div class="form_field">
                        <input type="file" id="book_hero_image" name="book_hero_image" accept="image/*">
                        <div class="error-message"></div>
                    </div>
                </div>
                <div class="data_box">
                    <label for="book_title">
                        <h3>Título: </h3>
                    </label>
                    <div class="form_field">
                        <input type="text" name="book_title" id="book_title" placeholder="Ingresa el título del libro." required oninput="validateNotEmpty(event)">
                        <div class="error-message"></div>
                    </div>
                </div>
                <div class="data_box">
                    <label for="book_resume">
                        <h3>Resumen: </h3>
                    </label>
                    <div class="form_field">
                        <textarea name="book_resume" id="book_resume" placeholder="Ingresa una pequeña descripción." required oninput="validateNotEmpty(event)"></textarea>
                        <div class="error-message"></div>
                    </div>
                </div>
                <div class="data_box">
                    <label for="book_description">
                        <h3>Sinopsis: </h3>
                    </label>
                    <div class="form_field">
                        <textarea name="book_description" id="book_description" placeholder="Ingresa la sinopsis del libro." required oninput="validateNotEmpty(event)"></textarea>
                        <div class="error-message"></div>
                    </div>
                </div>
                <div class="data_box">
                    <label for="book_price">
                        <h3>Precio: </h3>
                    </label>
                    <div class="form_field">
                        <input type="number" name="book_price" id="book_price" placeholder="Ingresa el precio del libro." required oninput="validateNotEmpty(event)">
                        <div class="error-message"></div>
                    </div>
                </div>
                <div class="actions">
                    <div class="action_box edit_button active">
                        <div class="button" onclick="create(event)">Guardar</div>
                    </div>
                </div>
            </form>
        </section>
    </main>
    <?php include(BASE_URL . 'includes/layout/footer.php'); ?>
    <?php include(BASE_URL . 'includes/layout/js.php'); ?>
    <script src="./js/create-book.js"></script>
    <script src="./js/formValidations.js"></script>
</body>

</html>