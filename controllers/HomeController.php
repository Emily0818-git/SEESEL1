<?php

class HomeController {

    public function index() {
        require_once 'models/Empresa.php';
        $empresa = new Empresa();

        $datos = $empresa->getInfo();

        require_once 'views/layout/header.php';
        require_once 'views/pages/inicio.php';
        require_once 'views/layout/footer.php';
    }
}