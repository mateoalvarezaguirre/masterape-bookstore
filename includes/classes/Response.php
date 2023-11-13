<?php

namespace Includes\Classes;

abstract class Response {

    public static function send($message, $code = 200){
		http_response_code($code);
		if(is_array($message)){
			header("Content-Type: application/json");
			echo json_encode($message);
			die;
		}
		echo $message;
		die;
	}

    public static function error()
    {
        http_response_code(500);
        header("Content-Type: application/json");
        echo json_encode([
            'message' => 'Ocurrió un error inesperado, intente nuevamente más tarde.'
        ]);
        die;
    }
}