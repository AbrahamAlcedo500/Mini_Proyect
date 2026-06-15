<?php
// index.php

// 1. Habilitamos la visualización de errores para la fase de desarrollo
ini_set('display_errors', 1);
error_reporting(E_ALL);

// 2. Cargamos el autoloader de Composer para que reconozca nuestras clases de forma automática
require_once __DIR__ . '/vendor/autoload.php';

// 3. Iniciamos la sesión global del servidor (Esencial para la protección de tokens CSRF)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 4. Instanciamos el controlador central de navegación y lo ponemos a arrancar
$controlador = new \App\MenuController();
$controlador->arrancar();