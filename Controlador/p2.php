<?php
require_once '../Modelo/ModeloP2.php';

// Inicializamos la variable que va a heredar la vista
$suma = ModeloP2::calcularSuma();

// Llamamos a la vista del problema 2
include '../Vista/problema2.php';
?>