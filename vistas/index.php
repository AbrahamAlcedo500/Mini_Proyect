<?php 
// vistas/menu.php

include __DIR__ . '/layout/header.php'; 
?>

<header>
    <div id="Titulo">
        <h1>MINI PROYECTO</h1>
    </div>
</header>

<div class="contenedor-principal">

    <div class="tarjeta tarjeta-p1">
        <h2>Problema 1</h2>
        <p>Calcular la <strong>media, desviación estándar, el número min y el máx</strong> de los 5 primeros números positivos introducidos a partir de un formulario.</p>
        <a href="index.php?p=1">Ir al problema 1</a>
    </div>

    <div class="tarjeta tarjeta-p2">
        <h2>Problema 2</h2>
        <p>Calcular la suma de los números del 1 al 1,000.<br><br><strong>Meta:</strong> 500500</p>
        <a href="index.php?p=2">Ir al problema 2</a>
    </div>

    <div class="tarjeta tarjeta-p3">
        <h2>Problema 3</h2>
        <p>Imprimir los N – primeros múltiplos de 4, dónde N es un valor introducido por teclado. (4*1=4; 4*2=8; 4*3=12)... ¿Desbordamiento?</p>
        <a href="index.php?p=3">Ir al problema 3</a>
    </div>

    <div class="tarjeta tarjeta-pr1">
        <h2>Problema 4</h2>
        <p>Se desea calcular independientemente la suma de los números pares e impares comprendidos entre 1 y 200.</p>
        <a href="index.php?p=4">Ir al problema 4</a>
    </div>

    <div class="tarjeta tarjeta-pr2">
        <h2>Problema 5</h2>
        <p>Leer la edad de 5 personas y clasificar cada una en una categoría: niño (0-12), adolescente (13-17), adulto (18-64), adulto mayor (65+). Generar estadísticas e integrar gráficas.</p>
        <a href="index.php?p=5">Ir al problema 5</a>
    </div>

    <div class="tarjeta tarjeta-pr3">
        <h2>Problema 6</h2>
        <p>En un hospital existen tres áreas: Ginecología, Pediatría y Traumatología. El presupuesto anual se reparte conforme a una tabla. Integrar Gráficas.</p>
        <a href="index.php?p=6">Ir al problema 6</a>
    </div>

    <div class="tarjeta tarjeta-a1">
        <h2>Problema 7</h2>
        <p><strong>Calculadora de Datos Estadísticos:</strong> Pedir la cantidad de notas que desea ingresar el usuario. Calcular promedio, desviación estándar, nota mínima y máxima usando <strong>foreach</strong> e integrar gráfica.</p>
        <a href="index.php?p=7">Ir al problema 7</a>
    </div>

    <div class="tarjeta tarjeta-a2">
        <h2>Problema 8</h2>
        <p><strong>Estación del Año:</strong> Al ingresar la fecha, devolver la estación del año de acuerdo con la tabla correspondiente. Usar datos de prueba.</p>
        <a href="index.php?p=8">Ir al problema 8</a>
    </div>

    <div class="tarjeta tarjeta-a3">
        <h2>Problema 9</h2>
        <p>Solicitar un número (1 al 9). Generar o imprimir las <strong>15 primeras potencias</strong> del número (4 elevado a la 1, 4 elevado a la dos, ...).</p>
        <a href="index.php?p=9">Ir al problema 9</a>
    </div>

</div>

<?php 
// Incluimos el pie de página común que cierra el body y el html
include __DIR__ . '/layout/footer.php'; 
?>