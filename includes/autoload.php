<?php
require_once __DIR__ . '/../conf/conf.php';

$folders = [
    'classes',
    'dtos',
    'entities',
    'enums',
    'repositories'
];

foreach ($folders as $folder){
    foreach ( glob(__DIR__."/{$folder}/*.php") as $filename) {
        require_once $filename;
    }
}

session_start();