<?php
namespace App;

use App\CalculosModel;
use App\Utilidades;

class MenuController {

    public function arrancar() {
        // 1. Detectar qué problema solicitó el usuario (?p=X)
        $idProblema = isset($_GET['p']) ? (int)$_GET['p'] : 0;
        $resultado = null;

        // 2. CASOS AUTOMÁTICOS (Peticiones por GET)
        if ($idProblema === 2) {
            $resultado = CalculosModel::problema2();
        } elseif ($idProblema === 4) {
            $resultado = CalculosModel::problema4();
        }

        // 3. PROCESAMIENTO DE FORMULARIOS (Peticiones POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // DETECCIÓN REAL DEL PASO:
    // Si es el problema 7, viene de la URL (?paso2=true) pero NO ha mandado notas todavía, significa que solo quiere GENERAR las cajitas.
    $soloEstaGenerandoCampos = ($idProblema === 7 && isset($_GET['paso2']) && !isset($_POST['notas_individuales']));

    // Solo exigimos y validamos Token CSRF si NO está solo generando campos
    if (!$soloEstaGenerandoCampos) {
        $tokenRecibido = $_POST['csrf_token'] ?? '';
        if (!Utilidades::validarCSRF($tokenRecibido)) {
            die("Error de seguridad: Token CSRF inválido.");
        }
    }

    // Procesar la lógica según el problema enviado
    switch ($idProblema) {
        case 1:
            $numeros = [
                (float)($_POST['n1'] ?? 0), (float)($_POST['n2'] ?? 0),
                (float)($_POST['n3'] ?? 0), (float)($_POST['n4'] ?? 0), (float)($_POST['n5'] ?? 0)
            ];
            $resultado = CalculosModel::problema1($numeros);
            break;

        case 3:
            $limite = (int)($_POST['limite'] ?? 0);
            $resultado = CalculosModel::problema3($limite);
            break;

        case 5:
            $edades = [
                (int)($_POST['e1'] ?? 0), (int)($_POST['e2'] ?? 0),
                (int)($_POST['e3'] ?? 0), (int)($_POST['e4'] ?? 0), (int)($_POST['e5'] ?? 0)
            ];
            $resultado = CalculosModel::problema5($edades);
            break;

        case 6:
            $monto = (float)($_POST['monto'] ?? 0);
            $resultado = CalculosModel::problema6($monto);
            break;

        case 7:
            // Si el arreglo viene vacío porque apenas va a mostrar el Paso 2, salimos del switch sin calcular
            if (!isset($_POST['notas_individuales'])) {
                break;
            }
            
            // Si ya vienen las notas, las procesamos con seguridad
            $notasArray = $_POST['notas_individuales'];
            $notasArray = array_map('floatval', $notasArray);
            $resultado = CalculosModel::problema7($notasArray);
            break;

        case 8:
            $fecha = $_POST['fecha'] ?? '';
            $resultado = CalculosModel::problema8($fecha);
            break;

        case 9:
            $base = (int)($_POST['base'] ?? 0);
            $resultado = CalculosModel::problema9($base);
            break;
    }
}
        // 4. SISTEMA DE ENRUTAMIENTO DE VISTAS
        if ($idProblema === 0) {
            include __DIR__ . '/../vistas/menu.php';
        } else {
            include __DIR__ . '/../vistas/formulario.php';
        }
    }
}