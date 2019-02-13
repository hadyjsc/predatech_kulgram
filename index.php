<?php
ini_set('display_errors', 1);
require 'load.php';
require 'controllers/UserController.php';

$pages = $_GET['page'];
if(!$pages){
    header('location:index.php?page=user/index');
}

$explode = explode('/',$pages);

$controller = $explode[0];
$action = $explode[1];

switch ($controller) {
    case 'user':
        $controller = new UserController();
        $controller->{$action}();
        break;
}
?>