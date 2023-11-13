<?php
require_once('./includes/autoload.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include(BASE_URL . 'includes/layout/meta.php'); ?>
    <?php include(BASE_URL . 'includes/layout/css.php'); ?>
    <title>MasterApe - Store</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link rel="stylesheet" href="./css/store.css">
    <link rel="stylesheet" href="./css/pagination.css">
</head>
<body>
    <?php include(BASE_URL . 'includes/layout/header.php'); ?>
    <main>
        <section class="welcome_bg">
            <div class="welcome_container">
                <div class="welcome_text">
                    <h1><strong>Selección<br><span class="welcome_text_span">Destacada</span></strong></h1>
                </div>
                <div class="banner_carousel">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="swiper_book">
                                    <img src="./images/cover_it.jpg" alt="Imagen de la portada de IT.">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="swiper_book">
                                    <img src="./images/cover_1984.jpg" alt="Imagen de la portada de 1984.">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="books_box"></div>
        <div class="pagination">
            <div class="pagination_arrow disabled">
                <i class="fa-solid fa-chevron-left"></i>
            </div>
            <div class="pagination_position active">
                1
            </div>
            <div class="pagination_position">
                2
            </div>
            <div class="pagination_position">
                3
            </div>
            <div class="pagination_arrow">
                <i class="fa-solid fa-chevron-right"></i>
            </div>
        </div>
    </main>
    <?php include(BASE_URL . 'includes/layout/footer.php'); ?>
    <?php include(BASE_URL . 'includes/layout/js.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="./js/pagination.js"></script>
    <script src="./js/store.js"></script>
    <script src="./js/swiperCarousel.js"></script>
</body>

</html>