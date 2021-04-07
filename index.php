<?php
require_once "./bootstrap.php";

    function startsWith($string, $startString)
    {
        $len = strlen($startString);
        return (substr($string, 0, $len) === $startString);
    }

    $url = $_SERVER['REQUEST_URI'];
    $rootPath = '/sprint3/';

    $url = $_SERVER['REQUEST_URI'];
    
    switch ($url) {
        
        case startsWith($url, $rootPath . 'admin'):
            require __DIR__ . '/src/views/admin.php';
            // print('you are in admin page');
            break;
        case startsWith($url, $rootPath):
            require __DIR__ . '/src/views/pages.php';
            // print('you are in user page');
            break;
        default:
            http_response_code(404);
            require __DIR__ . '/src/views/404.php';
            break;
    }