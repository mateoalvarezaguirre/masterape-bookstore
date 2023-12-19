<?php
require_once('./includes/autoload.php');

use Includes\Classes\Auth;
use Includes\Classes\DB;
use Includes\Classes\Request;
use Includes\Repositories\BookRepository;

$auth = new Auth();

$logged = $auth->isLogged();

$isAdmin = $auth->isAdmin();

if (!$logged || !$isAdmin) {
    header('Location: ./');
    exit();
}

$bookRepository = new BookRepository(new DB);

$page = Request::present('page') ?: 1;
$limit = Request::present('limit') ?: 10;

$books = $bookRepository->getAllBooks($page, $limit);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include(BASE_URL . 'includes/layout/meta.php'); ?>
    <?php include(BASE_URL . 'includes/layout/css.php'); ?>
    <title>MasterApe - Dashboard</title>
    <link rel="stylesheet" href="./css/dashboard.css">
    <link rel="stylesheet" href="./css/pagination.css">
</head>
<body>
    <?php include(BASE_URL . 'includes/layout/loader.php'); ?>
    <?php include(BASE_URL . 'includes/layout/header.php'); ?>
    <main>
        <div>
            <h1>Dashboard</h1>

            <?php 
                for ($i=0; $i < count($books['data']); $i++) { 
                    $bookId = $books['data'][$i]['id'];
                    ?>
                    <div class="book_dashboard book_dashboard_<?=$bookId?>">
                        <div class="book_images">
                            <div class="book_image">
                                <h3>Cover:</h3>
                                <img src="<?php echo "./images/" . $books['data'][$i]['cover_image']; ?>">
                            </div>
                            <div class="book_image">
                                <h3>Hero:</h3>
                                <img src="<?php echo "./images/" . $books['data'][$i]['hero_image']; ?>">
                            </div>
                        </div>
                        <div class="book_title">
                            <div class="label">
                                <h3>Título: </h3>
                            </div>
                            <div class="value">
                                <?=$books['data'][$i]['title']?>
                            </div>
                        </div>
                        <div class="book_resume">
                            <div class="label">
                                <h3>Resumen: </h3>
                            </div>
                            <div class="value">
                                <?=$books['data'][$i]['resume']?>
                            </div>
                        </div>
                        <div class="book_description">
                            <div class="label">
                                <h3>Sinopsis: </h3>
                            </div>
                            <div class="value">
                                <?=$books['data'][$i]['full_description']?>
                            </div>
                        </div>
                        <div class="book_price">
                            <div class="label">
                                <h3>Precio: </h3>
                            </div>
                            <div class="value">
                                $ <?=$books['data'][$i]['price']?>
                            </div>
                        </div>
                        <div class="actions">
                            <div class="action_box edit_button active">
                                <div class="button" onclick="edit(<?=$bookId?>)">Editar</div>
                            </div>
                            <div class="action_box save_and_cancel_button">
                                <div class="button" onclick="save(<?=$bookId?>)">Guardar</div>
                                <div class="button" onclick="cancel(<?=$bookId?>)">Cancelar</div>
                            </div>
                        </div>
                        <input type="hidden" class="original_data">
                    </div>
            <?php }
            ?>
            <div class="pagination">
                <a class="paginationLinks"
                    href="<?php echo $books['paginate']['current_page'] === 1 ? '' : './dashboard.php?page=' . $books['paginate']['current_page'] - 1;?>">
                    <div class="pagination_arrow <?php echo $books['paginate']['current_page'] === 1 ? 'disabled' : '' ?>">
                        <i class="fa-solid fa-chevron-left"></i>
                    </div>
                </a>
                <?php 
                for ($i=0; $i < $books['paginate']['last_page']; $i++) { ?>
                    <a class="paginationLinks" href="<?php echo './dashboard.php?page=' . $i + 1; ?>">
                        <div class="pagination_position <?php echo $books['paginate']['current_page'] == $i + 1 ? 'active' : '' ;?>">
                            <?=$i+1?>
                        </div>
                    </a>
                    <?php
                }
                ?>
                <a class="paginationLinks"
                    href="<?php echo $books['paginate']['current_page'] == $books['paginate']['last_page'] ? '' : './dashboard.php?page=' . $books['paginate']['current_page'] + 1;?>">
                    <div class="pagination_arrow <?php echo $books['paginate']['current_page'] == $books['paginate']['last_page'] ? 'disabled' : '' ?>">
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                </a>
            </div>
        </div>
    </main>
    <?php include(BASE_URL . 'includes/layout/footer.php'); ?>
    <?php include(BASE_URL . 'includes/layout/js.php'); ?>
    <script src="./js/dashboard.js"></script>
</body>

</html>