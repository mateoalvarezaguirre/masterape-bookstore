<?php

require_once('./includes/autoload.php');

use Includes\Classes\Auth;

$logged = Auth::isLogged();

if (!$logged) {
    header('Location: ./');
    exit();
}

$user = Auth::getUser();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include(BASE_URL . 'includes/layout/meta.php'); ?>
    <?php include(BASE_URL . 'includes/layout/css.php'); ?>
    <title>MasterApe - Bienvenido</title>
    <link rel="stylesheet" href="./css/welcome.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.10/lottie.min.js"></script>
</head>
<body>
    <?php include(BASE_URL . 'includes/layout/header.php'); ?>
    <main>
        <section id="welcome">
            <div class="welcome_container">
                <div class="welcome_data">
                    <h1>¡Bienvenid@ <?=$user->getFirstName()?>!</h1>
                    <div class="data_box">
                        <div class="label">
                            Nombre:
                        </div>
                        <div class="value">
                            <?=$user->getFullName();?>
                        </div>
                    </div>
                    <div class="data_box">
                        <div class="label">
                            Email:
                        </div>
                        <div class="value">
                            <?=$user->getEmail();?>
                        </div>
                    </div>
                    <div class="data_box">
                        <div class="label">
                            Username:
                        </div>
                        <div class="value">
                            <?=$user->getUserName();?>
                        </div>
                    </div>
                </div>
                <div class="welcome_image">
                    <div id="welcome_animation"></div>
                </div>
            </div>
        </section>
    </main>
    <?php include(BASE_URL . 'includes/layout/footer.php'); ?>
    <?php include(BASE_URL . 'includes/layout/js.php'); ?>
    <script src="./js/welcome.js"></script>
</body>

</html>