<?php
require_once('./includes/autoload.php');

use Includes\Classes\Book;
use Includes\Classes\Response;

if (!isset($_GET['action'])) {
    return invalidActionResponse();
}

$action = $_GET['action'];
$book = new Book;

try {
    return $book->$action();
} catch(\Throwable $th) {
    Response::error();
} 

function invalidActionResponse(): void
{
    Response::send(
        [
            'message' => 'Invalid action',
        ],
        400
    );
}