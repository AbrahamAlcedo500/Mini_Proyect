<?php
/** @var string $error */
/** @var float|null $media */
/** @var float|null $desviacion */
/** @var float|null $minimo */
/** @var float|null $maximo */
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Problema 1</title>
    <link rel="stylesheet" href="../Style1.css"> 
    
</head>
<body class="cuerpo-problemas">

    <header id="Titulo">
        <h1>Problema #1</h1>
    </header>

    <div class="contenedor-formulario">
        <h3>Calculadora Básica</h3>
        <p class="instruccion">Introduce 5 números positivos:</p>
        
        <form action="../Controlador/p1.php" method="POST" class="formulario-mvc">
            <div class="grupo-campo">
                <label>Número 1:</label>
                <input type="number" step="any" name="num1" required>
            </div>
            
            <div class="grupo-campo">
                <label>Número 2:</label>
                <input type="number" step="any" name="num2" required>
            </div>
            
            <div class="grupo-campo">
                <label>Número 3:</label>
                <input type="number" step="any" name="num3" required>
            </div>
            
            <div class="grupo-campo">
                <label>Número 4:</label>
                <input type="number" step="any" name="num4" required>
            </div>
            
            <div class="grupo-campo">
                <label>Número 5:</label>
                <input type="number" step="any" name="num5" required>
            </div>
            
            <button type="submit" class="btn-calcular">Calcular</button>
        </form>

        <?php
        // Si el controlador guardó un mensaje en la variable $error, se abre la llave
        if ($error != "") {
        ?>
            <div class="alerta-error">
                <strong>Error:</strong> <?php echo $error; ?>
            </div>
        <?php
        } // Cierre del error
        ?>

        <?php
        // Si el controlador ya calculó la media (o sea, no es null), se abre la llave
        if ($media !== null) {
        ?>
            <div class="alerta-exito">
                <h4>Resultados:</h4>
                <ul>
                    <li>Media: <?php echo $media; ?></li>
                    <li>Desviación Estándar: <?php echo $desviacion; ?></li>
                    <li>Mínimo: <?php echo $minimo; ?></li>
                    <li>Máximo: <?php echo $maximo; ?></li>
                </ul>
            </div>
        <?php
        } // Cierre de los resultados
        ?>

        <br>
        <a href="../index.php" class="enlace-atras">← Volver al Panel</a>
    </div>

    <footer class="pie-pagina">
        &copy; <?php echo date('Y'); ?> - UTP Desarrollo de Software VII.
    </footer>

</body>
</html>