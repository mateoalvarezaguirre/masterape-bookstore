<?php
require_once('./includes/autoload.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include(BASE_URL . 'includes/layout/meta.php'); ?>
    <?php include(BASE_URL . 'includes/layout/css.php'); ?>
    <title>MasterApe - Detalle</title>
    <link rel="stylesheet" href="./css/detail.css">
    <link rel="stylesheet" href="./css/skeleton.css">
</head>

<body>
    <?php include(BASE_URL . 'includes/layout/header.php'); ?>
    <main>
        <section class="book_details_container">
            <div class="hero_banner">
                <div class="loading_box skeleton">
                    <h1>...</h1>
                </div>
            </div>
            <div class="book_detail_image">
                <div class="skeleton" style="height: 60vh;"></div>
            </div>
            <div class="book_detail">
                <div class="book_detail_text">
                    <div class="description">
                        <div class="skeleton skeleton-text"></div>
                        <div class="skeleton skeleton-text"></div>
                        <div class="skeleton skeleton-text"></div>
                        <div class="skeleton skeleton-text"></div>
                        <div class="skeleton skeleton-text"></div>
                        <div class="skeleton skeleton-text"></div>
                    </div>
                    <div class="author">
                        <div class="skeleton skeleton-text" style="width: 20%;height: 1rem;"></div>
                    </div>
                    <div class="actions">
                        <div class="skeleton skeleton-text" style="width: 20%;margin: 0 15px 0 0;height: 1.5rem;"></div>
                        <div class="skeleton skeleton-text" style="width: 20%;height: 1.5rem;"></div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include(BASE_URL . 'includes/layout/footer.php'); ?>
    <?php include(BASE_URL . 'includes/layout/js.php'); ?>
    <script src="./js/detalle.js"></script>
</body>

</html>