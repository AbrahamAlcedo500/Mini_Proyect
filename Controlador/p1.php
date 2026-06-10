<?php
// p1.php - Controlador del Problema 1

// 1. Jalamos el archivo del Modelo obligatoriamente
require_once '../Modelo/ModeloP1.php';

// 2. DECLARAMOS LAS VARIABLES EN BLANCO (Para que la vista no explote)
$error = "";
$media = null;
$desviacion = null;
$minimo = null;
$maximo = null;

// 3. PREGUNTAMOS: ¿El usuario ya le dio al botón de "Calcular"?
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Agarramos los 5 números que vienen del formulario en la Vista
    $n1 = floatval($_POST['num1']);
    $n2 = floatval($_POST['num2']);
    $n3 = floatval($_POST['num3']);
    $n4 = floatval($_POST['num4']);
    $n5 = floatval($_POST['num5']);

    // 4. VALIDACIÓN DE LA RÚBRICA: Que todos sean mayores a cero (positivos)
    if ($n1 <= 0 || $n2 <= 0 || $n3 <= 0 || $n4 <= 0 || $n5 <= 0) {
        // Si hay un negativo o cero, llenamos la variable error
        $error = "La rúbrica exige que los 5 números ingresados sean POSITIVOS.";
    } else {
        // Si todos son positivos, los metemos en un arreglo limpio
        $lista = [$n1, $n2, $n3, $n4, $n5];

        // Conseguimos el mínimo y máximo con funciones de PHP
        $minimo = min($lista);
        $maximo = max($lista);

        // 5. LLAMAMOS AL MODELO: Le pasamos los números para que haga la matemática
        $media = ModeloP1::calcularMedia($lista);
        $desviacion = ModeloP1::calcularDesviacion($lista, $media);
    }
}

// 6. AL FINAL, EL CONTROLADOR SIEMPRE ABRE LA VISTA
include '../Vista/problema1.php';
?>