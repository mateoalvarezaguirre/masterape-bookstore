<?php
require_once('./includes/autoload.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include(BASE_URL . 'includes/layout/meta.php'); ?>
    <?php include(BASE_URL . 'includes/layout/css.php'); ?>
    <title>MasterApe - Sobre nosotros</title>
    <link rel="stylesheet" href="./css/about.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.10/lottie.min.js"></script>
</head>
<body>
    <?php include(BASE_URL . 'includes/layout/header.php'); ?>
    <main>
        <section id="about">
            <div>
                <h1>Sobre <br>
                    <span class="font_sacramento" style="font-size: 5.5rem;">
                        Nosotros
                    </span>
                </h1>
                <p>
                    ¡Bienvenido a <strong>Master Ape</strong>, la tienda de libros en línea que te lleva a un mundo de
                    aventuras y conocimientos! En Master Ape, creemos que la lectura es una de las mejores formas de
                    expandir tus horizontes y enriquecer tu vida. Por eso, estamos comprometidos a ofrecerte la mejor
                    selección de libros en línea y una experiencia de compra fácil y satisfactoria.
                </p>
                <p>
                    En esta tienda, encontrarás una amplia selección de libros de todos los géneros y temas, desde los
                    bestsellers más populares hasta las obras literarias más innovadoras y originales. Ya sea que estés
                    buscando una novela emocionante para leer en un fin de semana, un libro de negocios para mejorar tus
                    habilidades profesionales o un libro infantil para compartir con tus hijos, ¡en Master Ape lo
                    tenemos
                    todo!
                </p>
                <p>
                    Nos enorgullece ofrecer una experiencia de compra en línea excepcional. Ofrecemos envío gratuito en
                    todos los pedidos, devoluciones fáciles y una atención al cliente excepcional. Además, nuestro
                    equipo de
                    expertos en libros está aquí para ayudarte a encontrar los libros perfectos para ti, ya sea que
                    estés
                    buscando algo específico o necesites recomendaciones basadas en tus gustos y preferencias.
                </p>
                <p>
                    Aquí encontrarás todo lo que necesitas para nutrir tu pasión por la lectura y enriquecer tu vida con
                    nuevas ideas y conocimientos. ¡Gracias por visitarnos y esperamos que disfrutes navegando por
                    nuestra
                    selección de libros!
                </p>
            </div>
            <div class="desktop">
                <div id="about_animation"></div>
            </div>
        </section>
    </main>
    <?php include(BASE_URL . 'includes/layout/footer.php'); ?>
    <?php include(BASE_URL . 'includes/layout/js.php'); ?>
    <script src="./js/about.js"></script>
</body>

</html>