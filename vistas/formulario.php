<?php
// vistas/formulario.php
include __DIR__ . '/layout/header.php';

use App\Utilidades;

$tokenCsrf = Utilidades::generarCSRF();
$idProblema = isset($_GET['p']) ? (int)$_GET['p'] : 0;
?>

<style>
    .container { max-width: 600px; margin: 40px auto; font-family: Arial, sans-serif; padding: 0 20px; }
    .card-formulario { background: #1e293b; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.2); padding: 30px; border: 1px solid #334155; color: #f8fafc; }
    .titulo-problema { color: #38bdf8; border-bottom: 2px solid #334155; padding-bottom: 10px; margin-bottom: 20px; text-align: center; }
    .subtitle { color: #94a3b8; font-size: 14px; margin-bottom: 20px; text-align: center; }
    .form-group { margin-bottom: 15px; display: flex; flex-direction: column; }
    .form-group label { font-weight: bold; margin-bottom: 5px; color: #cbd5e1; }
    .form-group input { padding: 10px; border: 1px solid #475569; border-radius: 6px; font-size: 15px; background: #0f172a; color: white; }
    .btn-ejecutar { background: #38bdf8; color: #0f172a; border: none; padding: 12px 20px; font-weight: bold; border-radius: 6px; cursor: pointer; width: 100%; font-size: 16px; margin-top: 10px; }
    .btn-ejecutar:hover { background: #0ea5e9; color: white; }
    
    .resultado-box { margin-top: 25px; background: #064e3b; border: 1px solid #059669; padding: 20px; border-radius: 8px; color: #a7f3d0; }
    .resultado-box h3 { margin-top: 0; color: #34d399; border-bottom: 1px solid #059669; padding-bottom: 5px; }
    .resultado-box pre { font-family: monospace; font-size: 14px; line-height: 1.5; white-space: pre-wrap; margin: 0; background: none; color: #a7f3d0; border: none; padding: 0;}
    
    .volver-container { text-align: center; margin-top: 25px; }
    .btn-volver { color: #38bdf8; text-decoration: none; font-weight: bold; font-size: 14px; }
    .btn-volver:hover { text-decoration: underline; }
</style>

<main class="container">
    <div class="card-formulario">

        <h2 class="titulo-problema">Problema Algorítmico #<?php echo $idProblema; ?></h2>

        <?php if (in_array($idProblema, [1, 3, 5, 6, 8, 9])): ?>
            <form action="index.php?p=<?php echo $idProblema; ?>" method="POST">
                <input type="hidden" name="csrf_token" value="<?php echo $tokenCsrf; ?>">

                <?php if ($idProblema === 1): ?>
                    <p class="subtitle">Calcular estadísticas de 5 números no-negativos.</p>
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <div class="form-group">
                            <label>Número <?php echo $i; ?>:</label>
                            <input type="number" step="any" name="n<?php echo $i; ?>" required>
                        </div>
                    <?php endfor; ?>

                <?php elseif ($idProblema === 3): ?>
                    <p class="subtitle">Imprimir los N primeros múltiplos de 4 (Máximo 50).</p>
                    <div class="form-group">
                        <label>Cantidad (N):</label>
                        <input type="number" min="1" max="50" name="limite" required>
                    </div>

                <?php elseif ($idProblema === 5): ?>
                    <p class="subtitle">Clasificar la edad de 5 personas en categorías.</p>
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <div class="form-group">
                            <label>Edad de la Persona #<?php echo $i; ?>:</label>
                            <input type="number" min="0" max="120" name="e<?php echo $i; ?>" required placeholder="Ej: 21">
                        </div>
                    <?php endfor; ?>

                <?php elseif ($idProblema === 6): ?>
                    <p class="subtitle">Calcular presupuesto de áreas del Hospital.</p>
                    <div class="form-group">
                        <label>Monto Presupuestal Anual ($):</label>
                        <input type="number" min="1" step="any" name="monto" required placeholder="Ej: 500000">
                    </div>

                <?php elseif ($idProblema === 8): ?>
                    <p class="subtitle">Determinar la estación del año según la fecha.</p>
                    <div class="form-group">
                        <label>Seleccione una Fecha:</label>
                        <input type="date" name="fecha" required>
                    </div>

                <?php elseif ($idProblema === 9): ?>
                    <p class="subtitle">Generar las primeras 15 potencias de una base (1 al 9).</p>
                    <div class="form-group">
                        <label>Número Base:</label>
                        <input type="number" min="1" max="9" name="base" required>
                    </div>
                <?php endif; ?>

                <button type="submit" class="btn-ejecutar">Ejecutar Algoritmo</button>
            </form>
        <?php endif; ?>


        <?php if ($idProblema === 7): ?>
            
            <?php if ($_SERVER['REQUEST_METHOD'] !== 'POST' && !isset($_GET['paso2'])): ?>
                <p class="subtitle">Paso 1: Defina la cantidad de calificaciones que desea evaluar.</p>
                <form action="index.php?p=7&paso2=true" method="POST">
                    <div class="form-group">
                        <label>¿Cuántas notas desea ingresar?</label>
                        <input type="number" name="cantidad_notas" min="1" max="50" required placeholder="Ej: 5">
                    </div>
                    <button type="submit" class="btn-ejecutar">Siguiente -> Generar Notas</button>
                </form>

            <?php elseif (isset($_GET['paso2']) && !isset($resultado)): ?>
                <p class="subtitle">Paso 2: Introduzca los valores de las notas generadas.</p>
                <form action="index.php?p=7&paso2=true" method="POST">
                    <input type="hidden" name="csrf_token" value="<?php echo $tokenCsrf; ?>">
                    
                    <div style="max-height: 280px; overflow-y: auto; padding-right: 5px; margin-bottom: 15px;">
                        <?php 
                        $cantidad = isset($_POST['cantidad_notas']) ? (int)$_POST['cantidad_notas'] : 5;
                        for ($i = 1; $i <= $cantidad; $i++): 
                        ?>
                            <div class="form-group">
                                <label>Nota Estudiante #<?php echo $i; ?> (0-100):</label>
                                <input type="number" min="0" max="100" name="notas_individuales[]" required>
                            </div>
                        <?php endfor; ?>
                    </div>

                    <button type="submit" class="btn-ejecutar">Calcular Métricas Estadísticas</button>
                </form>
            <?php endif; ?>

        <?php endif; ?>


        <?php if (isset($resultado)): ?>
            <div class="resultado-box">
                <h3>Resultados Obtenidos</h3>
                <?php if (is_string($resultado)): ?>
                    <pre><?php echo Utilidades::sanitizar($resultado); ?></pre>
                <?php else: ?>
                    <pre><?php
                        foreach ($resultado as $clave => $valor) {
                            if (is_array($valor)) continue; // Evita romper si hay sub-arreglos
                            
                            if ($idProblema === 6) {
                                $icono = (strpos($clave, 'Asignado') !== false) ? "💰 " : "🩺 ";
                                // Si ya contiene el signo '$', lo imprimimos directo sin volver a formatear
                                if (strpos($valor, '$') !== false) {
                                    echo $icono . Utilidades::sanitizar($clave) . ": " . Utilidades::sanitizar($valor) . "\n";
                                } else {
                                    echo $icono . Utilidades::sanitizar($clave) . ": $" . (is_numeric($valor) ? number_format($valor, 2) : Utilidades::sanitizar($valor)) . "\n";
                                }
                            } else {
                                echo Utilidades::sanitizar($clave) . ": " . Utilidades::sanitizar($valor) . "\n";
                            }
                        }
                    ?></pre>

                    <?php if ($idProblema === 5): ?>
                        <div style="margin-top: 25px;">
                            <h4 style="text-align: center; color: #34d399; font-size:15px; margin-bottom:10px;">Distribución por Rangos de Edad</h4>
                            <div style="position: relative; height:220px; width:100%;">
                                <canvas id="graficaEdades"></canvas>
                            </div>
                        </div>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                const ctx = document.getElementById('graficaEdades').getContext('2d');
                                new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: ['Niño (0-12)', 'Adolescente (13-17)', 'Adulto (18-64)', 'Adulto Mayor (65+)'],
                                        datasets: [{
                                            label: 'Cantidad de Personas',
                                            data: [
                                                <?php echo (int)($resultado['Niños (0-12)'] ?? 0); ?>,
                                                <?php echo (int)($resultado['Adolescentes (13-17)'] ?? 0); ?>,
                                                <?php echo (int)($resultado['Adultos (18-64)'] ?? 0); ?>,
                                                <?php echo (int)($resultado['Adultos Mayores (65+)'] ?? 0); ?>
                                            ],
                                            backgroundColor: 'rgba(56, 189, 248, 0.7)',
                                            borderColor: '#38bdf8',
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        responsive: true,
                                        maintainAspectRatio: false,
                                        scales: {
                                            y: { 
                                                beginAtZero: true,
                                                suggestedMax: 4,
                                                ticks: { color: '#cbd5e1', stepSize: 1 } 
                                            },
                                            x: { ticks: { color: '#cbd5e1' } }
                                        },
                                        plugins: {
                                            legend: { display: false }
                                        }
                                    }
                                });
                            });
                        </script>
                    <?php endif; ?>

                    <?php if ($idProblema === 6): ?>
                        <div style="margin-top: 25px;">
                            <h4 style="text-align: center; color: #34d399; font-size:15px; margin-bottom:15px;">Distribución Presupuestaria del Hospital</h4>
                            <div style="position: relative; height:250px; width:100%;">
                                <canvas id="graficaHospital"></canvas>
                            </div>
                        </div>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                // Helper para limpiar los caracteres '$' y ',' del string antes de parsearlo a flotante
                                function limpiarMonto(valor) {
                                    if (typeof valor === 'string') {
                                        return parseFloat(valor.replace(/[\$,]/g, '')) || 0;
                                    }
                                    return parseFloat(valor) || 0;
                                }

                                const gine = limpiarMonto(<?php echo json_encode($resultado['Ginecología (40%)'] ?? $resultado['Ginecología'] ?? $resultado['Ginecologia'] ?? 0); ?>);
                                const trau = limpiarMonto(<?php echo json_encode($resultado['Traumatología (35%)'] ?? $resultado['Traumatología'] ?? $resultado['Traumatologia'] ?? 0); ?>);
                                const pedi = limpiarMonto(<?php echo json_encode($resultado['Pediatría (25%)'] ?? $resultado['Pediatría'] ?? $resultado['Pediatria'] ?? 0); ?>);

                                const ctx = document.getElementById('graficaHospital').getContext('2d');
                                new Chart(ctx, {
                                    type: 'pie',
                                    data: {
                                        labels: ['Ginecología (40%)', 'Traumatología (35%)', 'Pediatría (25%)'],
                                        datasets: [{
                                            data: [gine, trau, pedi],
                                            backgroundColor: [
                                                'rgba(54, 162, 235, 0.85)',
                                                'rgba(243, 156, 18, 0.85)',
                                                'rgba(231, 76, 60, 0.85)'
                                            ],
                                            borderColor: '#1e293b',
                                            borderWidth: 2
                                        }]
                                    },
                                    options: {
                                        responsive: true,
                                        maintainAspectRatio: false,
                                        plugins: {
                                            legend: {
                                                position: 'bottom',
                                                labels: {
                                                    color: '#cbd5e1',
                                                    font: { size: 13, family: 'Arial' },
                                                    padding: 15
                                                }
                                            }
                                        }
                                    }
                                });
                            });
                        </script>
                    <?php endif; ?>

                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="volver-container">
            <?php echo Utilidades::enlaceVolver(); ?>
        </div>

    </div>
</main>

<?php 
include __DIR__ . '/layout/footer.php'; 
?>