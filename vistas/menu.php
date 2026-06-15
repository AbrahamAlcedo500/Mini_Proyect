<?php 
// vistas/menu.php

// Incluimos la cabecera común (Principio DRY)
include __DIR__ . '/layout/header.php'; 
?>

<main class="container">
    <div style="text-align: center; margin-bottom: 30px;">
        <span style="font-size: 40px;">📋</span>
        <h2 style="border: none; margin-bottom: 5px; padding-bottom: 0;">MINI PROYECTO</h2>
        <p class="subtitle" style="margin-top: 5px;">Estructuras de Decisión, Repetición y Patrón MVC</p>
    </div>

    <h3 style="border-bottom: 2px solid #efefef; padding-bottom: 8px; font-size: 16px; text-transform: uppercase; letter-spacing: 0.5px; color: #718096;">
        Seleccione un problema algorítmico:
    </h3>
    
    <div class="grid-problemas">
        <a href="index.php?p=1" class="card">
            <strong>#01. Estadística de 5 Números</strong>
            <span>Calcula media, desviación estándar, valor mínimo y máximo de positivos.</span>
        </a>
        
        <a href="index.php?p=2" class="card">
            <strong>#02. Sumatoria Automática</strong>
            <span>Algoritmo iterativo que calcula la suma de los números del 1 al 1,000.</span>
        </a>
        
        <a href="index.php?p=3" class="card">
            <strong>#03. Múltiplos de 4</strong>
            <span>Genera e imprime en secuencia los N-primeros múltiplos de 4.</span>
        </a>
        
        <a href="index.php?p=4" class="card">
            <strong>#04. Suma Par / Impar</strong>
            <span>Calcula de forma independiente las sumas de pares e impares (1 al 200).</span>
        </a>
        
        <a href="index.php?p=5" class="card">
            <strong>#05. Clasificador de Edades</strong>
            <span>Agrupa 5 edades en categorías (Niño, Adolescente, Adulto, Adulto Mayor).</span>
        </a>
        
        <a href="index.php?p=6" class="card">
            <strong>#06. Presupuesto Hospitalario</strong>
            <span>Distribuye proporcionalmente el presupuesto en Ginecología, Traumatología y Pediatría.</span>
        </a>
        
        <a href="index.php?p=7" class="card">
            <strong>#07. Notas Escolares Dinámicas</strong>
            <span>Calculadora estadística basada en una lista variable de notas de estudiantes.</span>
        </a>
        
        <a href="index.php?p=8" class="card">
            <strong>#08. Detector de Estaciones</strong>
            <span>Determina la estación del año (Verano, Otoño, Invierno, Primavera) según la fecha.</span>
        </a>
        
        <a href="index.php?p=9" class="card">
            <strong>#09. Tabla de Potencias</strong>
            <span>Solicita un número base (1 al 9) y calcula sus primeras 15 potencias.</span>
        </a>
    </div>
</main>

<?php 
// Incluimos el pie de página con la fecha dinámica exigida
include __DIR__ . '/layout/footer.php'; 
?>