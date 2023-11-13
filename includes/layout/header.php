<?php
require_once('./includes/autoload.php');

use Includes\Classes\Auth;

$logged = (new Auth)->isLogged();
?>

<header>
    <nav>
        <div class="nav_container desktop">
            <div class="logo_box">
                <a href="./">
                    <img class="logo_image" src="./images/logo_dark.svg" alt="Logo de MasterApe.">
                </a>
            </div>
            <div class="menu_box">
                <div class="font_sacramento">
                    <a href="./store.php">Store</a>
                </div>
                <div class="font_sacramento">
                    <a href="./sobre-nosotros.php">Nosotros</a>
                </div>
                <?php if($logged) : ?>
                    <div class="login_box">
                        <a href="./logout.php">
                            <div class="button ingreso_btn">
                                <i class="fa-solid fa-right-from-bracket" style="margin-right: 10px;"></i>
                                Logout
                            </div>
                        </a>
                    </div>
                <?php else : ?>
                    <div class="login_box">
                        <a href="./login.php">
                            <div class="button ingreso_btn">Ingresar</div>
                        </a>
                        <a href="./signup.php">
                            <div class="button registro_btn">Registrarse</div>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="nav_container mobile">
            <div class="navButton" onclick="showOrHideMenu()">
                <i class="fa-solid fa-bars"></i>
            </div>
            <div class="logo_box">
                <a href="./">
                    <img src="./images/logo_light.svg" alt="Logo de MasterApe.">
                </a>
            </div>
            <div class="menu_box">
                <div class="font_sacramento">
                    <a href="./store.php">Store</a>
                </div>
                <div class="font_sacramento">
                    <a href="./sobre-nosotros.php">Nosotros</a>
                </div>
                <?php if($logged) : ?>
                    <div class="login_box" style="justify-content: center;">
                        <a href="./logout.php">
                            <div class="button ingreso_btn" style="margin-right: 0;">
                                <i class="fa-solid fa-right-from-bracket" style="margin-right: 10px;"></i>
                                Logout
                            </div>
                        </a>
                    </div>
                <?php else : ?>
                    <div class="login_box">
                        <a href="./login.php">
                            <div class="button ingreso_btn">Ingresar</div>
                        </a>
                        <a href="./signup.php">
                            <div class="button registro_btn">Registrarse</div>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>

<script src="./js/header.js"></script>