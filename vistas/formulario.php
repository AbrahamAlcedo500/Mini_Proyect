<?php
// vistas/formulario.php

include __DIR__ . '/layout/header.php';
use App\Utilidades;

$tokenCsrf = Utilidades::generarCSRF();
$idProblema = isset($_GET['p']) ? (int)$_GET['p'] : 0;
?>

<main class="container">

    <div class="card-formulario">

        <h2 class="titulo-problema">
            Problema Algorítmico #<?php echo $idProblema; ?>
        </h2>

        <?php if (in_array($idProblema, [1, 3, 5, 6, 7, 8, 9])): ?>

            <form action="index.php?p=<?php echo $idProblema; ?>" method="POST" class="form-algoritmo">

                <input type="hidden" name="csrf_token" value="<?php echo $tokenCsrf; ?>">

                <?php if ($idProblema === 1): ?>

                    <p class="subtitle">
                        Ingrese 5 números. El sistema omitirá automáticamente los valores negativos o iguales a cero.
                    </p>

                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <div class="form-group">
                            <label>Número <?php echo $i; ?></label>
                            <input
                                type="number"
                                step="any"
                                name="n<?php echo $i; ?>"
                                required
                                placeholder="Ejemplo: 14.5">
                        </div>
                    <?php endfor; ?>

                <?php elseif ($idProblema === 3): ?>

                    <p class="subtitle">
                        Generación automática de los N primeros múltiplos de 4.
                    </p>

                    <div class="form-group">
                        <label>Cantidad de múltiplos a generar</label>
                        <input
                            type="number"
                            min="1"
                            name="limite"
                            required
                            placeholder="Ejemplo: 10">
                    </div>

                <?php elseif ($idProblema === 5): ?>

                    <p class="subtitle">
                        Clasificación estadística de personas según rango de edad.
                    </p>

                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <div class="form-group">
                            <label>Edad de la Persona <?php echo $i; ?></label>
                            <input
                                type="number"
                                min="0"
                                max="120"
                                name="e<?php echo $i; ?>"
                                required
                                placeholder="Ejemplo: 21">
                        </div>
                    <?php endfor; ?>

                <?php elseif ($idProblema === 6): ?>

                    <p class="subtitle">
                        Distribución proporcional del presupuesto anual del hospital.
                    </p>

                    <div class="form-group">
                        <label>Presupuesto Total ($)</label>
                        <input
                            type="number"
                            min="1"
                            step="any"
                            name="monto"
                            required
                            placeholder="Ejemplo: 500000">
                    </div>

                <?php elseif ($idProblema === 7): ?>

                    <p class="subtitle">
                        Análisis estadístico de calificaciones estudiantiles.
                    </p>

                    <div class="form-group">
                        <label>Notas separadas por comas</label>
                        <input
                            type="text"
                            name="lista_notas"
                            required
                            placeholder="Ejemplo: 91,85,100,73,64">
                    </div>

                <?php elseif ($idProblema === 8): ?>

                    <p class="subtitle">
                        Determinación automática de la estación del año.
                    </p>

                    <div class="form-group">
                        <label>Seleccione una fecha</label>
                        <input
                            type="date"
                            name="fecha"
                            required>
                    </div>

                <?php elseif ($idProblema === 9): ?>

                    <p class="subtitle">
                        Generación de las primeras 15 potencias de un número base.
                    </p>

                    <div class="form-group">
                        <label>Número Base (1 - 9)</label>
                        <input
                            type="number"
                            min="1"
                            max="9"
                            name="base"
                            required
                            placeholder="Ejemplo: 5">
                    </div>

                <?php endif; ?>

                <button type="submit" class="btn-ejecutar">
                    Ejecutar Algoritmo
                </button>

            </form>

        <?php endif; ?>


        <?php if (isset($resultado)): ?>

            <?php if ($idProblema === 8): ?>

                <div class="resultado-estacion-box">

                    <h3>Resultado del Análisis</h3>

                    <p>
                        <?php echo Utilidades::sanitizar($resultado); ?>
                    </p>

                </div>

            <?php else: ?>

                <div class="resultado-box">

                    <h3>Resultado del Procesamiento</h3>

                    <pre><?php

                        if (is_array($resultado)) {

                            foreach ($resultado as $clave => $valor) {

                                echo Utilidades::sanitizar($clave)
                                . ": "
                                . Utilidades::sanitizar($valor)
                                . "\n";
                            }

                        } else {

                            echo Utilidades::sanitizar($resultado);

                        }

                    ?></pre>

                </div>

            <?php endif; ?>

        <?php endif; ?>

        <div class="volver-container">
            <?php echo Utilidades::enlaceVolver(); ?>
        </div>

    </div>

</main>

<style>

.card-formulario{
    background:rgba(15,23,42,.45);
    border:1px solid rgba(255,255,255,.08);
    border-radius:22px;
    padding:35px;
    backdrop-filter:blur(12px);
}

.titulo-problema{
    text-align:center;
    margin-bottom:25px;
}

.form-algoritmo{
    margin-top:15px;
}

.btn-ejecutar{
    margin-top:15px;
}

.resultado-box{
    margin-top:30px;
}

.resultado-estacion-box{
    margin-top:30px;
}

.volver-container{
    text-align:center;
    margin-top:30px;
}

.volver-container a{
    display:inline-block;
    padding:12px 24px;
    border-radius:12px;
    border:1px solid rgba(255,255,255,.15);
    background:rgba(255,255,255,.05);
    transition:.3s;
}

.volver-container a:hover{
    background:rgba(0,212,255,.15);
    border-color:#00d4ff;
}

pre{
    overflow-x:auto;
}

</style>

<?php
include __DIR__ . '/layout/footer.php';
?>