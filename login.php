<?php
require_once('./includes/autoload.php');

use Includes\Classes\Auth;
use Includes\Classes\Request;
use Includes\Classes\Response;
use Includes\Dtos\LoginUserDTO;

$auth = new Auth();

if (Request::isPOST()) {
    $auth->login(
        new LoginUserDTO(
            $_POST['email'] ?? '',
            $_POST['password'] ?? ''
        )
    );

    Response::send(
        [
            'message' => '¡Perfecto!'
        ],
    );
}

if ($auth->isLogged()) {
    header('Location: ./');
    exit();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include(BASE_URL . 'includes/layout/meta.php'); ?>
    <?php include(BASE_URL . 'includes/layout/css.php'); ?>
    <title>MasterApe - Login</title>
    <link rel="stylesheet" href="./css/login.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.10/lottie.min.js"></script>
</head>
<body>
    <?php include(BASE_URL . 'includes/layout/loader.php'); ?>
    <?php include(BASE_URL . 'includes/layout/header.php'); ?>
    <main>
        <section id="login">
            <div class="login_container">
                <div class="login_form">
                    <h1>Login</h1>
                    <form action="" onsubmit="login(event)">
                        <div class="form_field">
                            <input type="text" id="email" name="email" placeholder="Ingresa tu email o username" required>
                        </div>
                        <div class="form_field">
                            <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña"
                                required>
                        </div>
                        <button type="submit" class="button login_btn">Ingresar</button>
                    </form>
                </div>
                <div class="login_image desktop">
                    <div id="login_animation"></div>
                </div>
            </div>
        </section>
    </main>
    <?php include(BASE_URL . 'includes/layout/footer.php'); ?>
    <?php include(BASE_URL . 'includes/layout/js.php'); ?>
    <script src="./js/login.js"></script>
</body>

</html>