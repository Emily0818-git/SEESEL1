<?php

class ProductosController {
    public function index() {
        require_once 'views/layout/header.php';
        require_once 'views/productos/index.php';
        require_once 'views/layout/footer.php';
    }
}
