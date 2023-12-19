<?php

namespace Includes\Classes;

abstract class Request {

    public static function present($key){
        if(isset($_POST[$key])){
            return $_POST[$key];
        }
        if(isset($_GET[$key])){
            return $_GET[$key];
        }
        return false;
    }

    public static function presentFile($key){
        if(isset($_FILES[$key])){
            return $_FILES[$key];
        }
        return false;
    }

    public static function isPOST(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }
}