<?php
require_once('./includes/autoload.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include(BASE_URL . 'includes/layout/meta.php'); ?>
    <?php include(BASE_URL . 'includes/layout/css.php'); ?>
    <title>MasterApe - Error</title>
    <link rel="stylesheet" href="./css/error.css">
</head>
<body>
    <main>
        <div class="error-container">
            <img src="./images/error.svg" alt="Ilustración de un servidor con un cable cortado.">
            <div class="error-text">
                <h1>¡Ups! Ocurrió un error inesperado.</h1>
                <a href="./">
                    <div class="button">Volver al inicio</div>
                </a>
            </div>
        </div>
    </main>
</body>

</html>