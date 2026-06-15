<?php
/** @var array $suma */
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Problema 2</title>
    <link rel="stylesheet" href="../EstilosReuti.css"> 
</head>
<body class="cuerpo-problemas">

    <header id="Titulo">
        <h1>Problema #2</h1>
    </header>

    <div class="contenedor-formulario">
        <h3>Corrida en Bucle (1 al 1000)</h3>
        <p class="instruccion">Demostración analítica del acumulador en memoria.</p>
        
        <div class="alerta-exito">
            <h4>Simulación del Ciclo For:</h4>
            
            <ul>
                <?php foreach ($suma['pasos'] as $paso) { ?>
                    <li class="linea-iteracion">
                        <span>Iteración #<?php echo $paso['iteracion']; ?>: (<?php echo $paso['operacion']; ?>)</span>
                        <strong>= <?php echo $paso['acumulado']; ?></strong>
                    </li>
                <?php } ?>
                
                <li class="puntos-suspensivos">
                    • • • ( El bucle procesa del 6 al 999 en memoria ) • • •
                </li>
                
                <li class="resultado-final-bucle">
                    <span>Suma Total Final:</span>
                    <strong class="total-destacado">
                        <?php echo $suma['total']; ?>
                    </strong>
                </li>
            </ul>
        </div>

        <br>
        <a href="../index.php" class="enlace-atras">← Volver al Panel</a>
    </div>

    <footer class="pie-pagina">
        &copy; <?php echo date('Y'); ?> - UTP Desarrollo de Software VII.
    </footer>

</body>
</html>