<?php

// Controlador y acción por defecto
$controller = $_GET['c'] ?? 'home';
$action     = $_GET['a'] ?? 'index';

switch ($controller) {

    case 'pages':
        require_once 'controllers/PagesController.php';
        $pages = new PagesController();

        if (method_exists($pages, $action)) {
            $pages->$action();
        } else {
            $pages->index();
        }
        break;


    case 'productos':
        require_once 'controllers/ProductosController.php';
        $productos = new ProductosController();

        if (method_exists($productos, $action)) {
            $productos->$action();
        } else {
            $productos->index();
        }
        break;


    /* =========================================
       CONTACTO
    ========================================== */
    case 'contacto':
        require_once 'controllers/ContactoController.php';
        $contacto = new ContactoController();

        if (method_exists($contacto, $action)) {
            $contacto->$action();
        } else {
            $contacto->index();
        }
        break;


    case 'home':
    default:
        require_once 'controllers/HomeController.php';
        $home = new HomeController();
        $home->index();
        break;
}