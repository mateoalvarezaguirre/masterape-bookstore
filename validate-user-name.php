<?php
require_once('./includes/autoload.php');

use Includes\Classes\Request;
use Includes\Classes\Response;
use Includes\Classes\User;


$username = Request::present('username');

if (!$username) {
    Response::send(
        [
            'message' => 'Invalid username'
        ],
        400
    );
}

(new User)->validateUserName($username);

Response::send([
    'message' => 'Username available'
]);