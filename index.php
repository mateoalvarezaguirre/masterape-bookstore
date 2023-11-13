<?php
require_once('./includes/autoload.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include(BASE_URL . 'includes/layout/meta.php'); ?>
    <title>MasterApe - The Bookstore</title>
    <?php include(BASE_URL . 'includes/layout/css.php'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.10/lottie.min.js"></script>
</head>
<body>
    <?php include(BASE_URL . 'includes/layout/loader.php'); ?>
    <?php include(BASE_URL . 'includes/layout/header.php'); ?>
    <main>
        <section class="welcome_bg">
            <div class="welcome_container" style="overflow: visible;">
                <div class="welcome_text">
                    <h1><strong>Somos <br><span class="welcome_text_span">Master Ape</span></strong></h1>
                    <h5>¡Descubre un mundo de conocimiento y aventuras literarias en nuestra tienda de libros online!</h5>
                    <a href="#contacto">
                        <div class="button welcome_btn">Ver más</div>
                    </a>
                </div>
                <div id="home_header_animation"></div>
            </div>
        </section>
        <div class="books_box">
        </div>
        <section id="contacto">
            <div class="contacto_container" id="contact-form">
                <div class="contacto_image desktop">
                    <div id="home_contact_animation"></div>
                </div>
                <div class="contacto_form">
                    <h5>Contacto</h5>
                    <form action="" onsubmit="contact(event)">
                        <div class="form_field">
                            <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>
                        </div>
                        <div class="form_field">
                            <input type="text" id="apellido" name="apellido" placeholder="Ingresa tu apellido" required>
                        </div>
                        <div class="form_field">
                            <input type="email" id="email" name="email" placeholder="Ingresa tu email" required>
                        </div>
                        <div class="form_field">
                            <input type="text" id="prefijo" name="prefijo" placeholder="Prefijo" required>
                            <input type="text" id="telefono" name="telefono" placeholder="Ingresa tu teléfono" required>
                        </div>
                        <div class="form_field">
                            <textarea name="motivo" id="motivo" cols="60" rows="5" placeholder="Motivo de contacto"
                                required></textarea>
                        </div>
                        <button type="submit" class="button contacto_btn">Enviar</button>
                    </form>
                </div>
            </div>
            <div class="contacto_container" id="contact-success">
                <div class="contacto_image desktop">
                    <img src="./images/message-received.svg" alt="Ilustración de un mensaje enviado.">
                </div>
                <div class="contacto_form">
                    <h5>¡Recibimos tu mensaje!</h5>
                    <h6>Nos pondremos en contacto pronto.</h6>
                </div>
            </div>
        </section>
    </main>
    <?php include(BASE_URL . 'includes/layout/footer.php'); ?>
    <?php include(BASE_URL . 'includes/layout/js.php'); ?>
    <script src="./js/index.js"></script>
</body>

</html>