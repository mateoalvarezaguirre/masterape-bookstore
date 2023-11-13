<?php
require_once('./includes/autoload.php');

use Includes\Classes\Auth;

(new Auth)->logout();

header('Location: ./');
exit();