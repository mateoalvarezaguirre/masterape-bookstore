<?php
require_once('./includes/autoload.php');

use Includes\Classes\Auth;
use Includes\Classes\Request;
use Includes\Classes\Response;
use Includes\Classes\User;
use Includes\Dtos\CreateUserDTO;
use Includes\Dtos\LoginUserDTO;

$auth = new Auth;

if (Request::isPOST()) {
    $dto = new CreateUserDTO(
        $_POST['first_name'] ?? '',
        $_POST['last_name'] ?? '',
        $_POST['email'] ?? '',
        $_POST['user_name'] ?? '',
        $_POST['password'] ?? '',
    );

    if ((new User)->create($dto)) {
        $auth->login(new LoginUserDTO(
            $_POST['email'],
            $_POST['password']
        ));

        Response::send([], 201);
    }

    Response::error();
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
    <title>MasterApe - Registro</title>
    <link rel="stylesheet" href="./css/signup.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.10/lottie.min.js"></script>
</head>

<body>
    <?php include(BASE_URL . 'includes/layout/loader.php'); ?>
    <?php include(BASE_URL . 'includes/layout/header.php'); ?>
    <main>
        <section id="register">
            <div class="register_container">
                <div class="register_image desktop">
                    <div id="signup_animation"></div>
                </div>
                <div class="register_form">
                    <h1>Registro</h1>
                    <form action="" onsubmit="signup(event)" id="signupForm">
                        <div class="form_field">
                            <input type="text" id="nombre" name="first_name" placeholder="Ingresa tu nombre" maxlength="50" required oninput="validateNotEmpty(event)">
                            <div class="error-message">
                            </div>
                        </div>
                        <div class="form_field">
                            <input type="text" id="apellido" name="last_name" placeholder="Ingresa tu apellido" maxlength="50" required oninput="validateNotEmpty(event)">
                            <div class="error-message">
                            </div>
                        </div>
                        <div class="form_field">
                            <input type="email" id="email" name="email" placeholder="Ingresa tu email" maxlength="50" required>
                            <div class="error-message">
                            </div>
                        </div>
                        <div class="form_field">
                            <input type="text" id="userName" name="user_name" maxlength="50" placeholder="Ingresa tu nombre de usuario" required>
                            <div class="error-message">
                            </div>
                        </div>
                        <div class="form_field">
                            <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" required>
                            <div class="error-message">
                            </div>
                        </div>
                        <div class="form_field">
                            <input type="password" id="passwordConfirm" name="passwordConfirm" placeholder="Confirma tu contraseña" required>
                            <div class="error-message">
                            </div>
                        </div>
                        <button type="submit" class="button register_btn">Registrarse</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <?php include(BASE_URL . 'includes/layout/footer.php'); ?>
    <?php include(BASE_URL . 'includes/layout/js.php'); ?>
    <script src="./js/signup.js"></script>
    <script src="./js/formValidations.js"></script>
</body>

</html>