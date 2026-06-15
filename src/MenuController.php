<?php
namespace App;

class MenuController {
    
    /**
     * Método principal que arranca el flujo y decide qué pantalla mostrar
     */
    public function arrancar() {
        // Capturamos el número de problema desde la URL de forma segura (0 por defecto)
        $problema = isset($_GET['p']) ? (int)$_GET['p'] : 0;

        // Estructura Switch exigida en el taller para enrutar las peticiones
        switch ($problema) {
            case 0:
                // Si es cero, incluimos el menú de selección principal
                include __DIR__ . '/../vistas/menu.php';
                break;
                
            case 1:
                $resultado = null;
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Control de Seguridad: Verificación estricta del Token Anti-CSRF
                    if (!Utilidades::validarCSRF($_POST['csrf_token'] ?? '')) {
                        die('Error de seguridad: Violación de token Anti-CSRF detectada.');
                    }
                    // Agrupamos las 5 entradas en un arreglo para mandarlas al Modelo
                    $numeros = [
                        (float)($_POST['n1'] ?? 0),
                        (float)($_POST['n2'] ?? 0),
                        (float)($_POST['n3'] ?? 0),
                        (float)($_POST['n4'] ?? 0),
                        (float)($_POST['n5'] ?? 0)
                    ];
                    $resultado = CalculosModel::problema1($numeros);
                }
                include __DIR__ . '/../vistas/formulario.php';
                break;

            case 2:
                // El problema 2 es automático (No requiere entradas), procesa directo en el modelo
                $resultado = CalculosModel::problema2();
                include __DIR__ . '/../vistas/formulario.php';
                break;
                
            case 3:
                $resultado = null;
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if (!Utilidades::validarCSRF($_POST['csrf_token'] ?? '')) {
                        die('Error de seguridad: Violación de token Anti-CSRF detectada.');
                    }
                    $resultado = CalculosModel::problema3((int)($_POST['limite'] ?? 0));
                }
                include __DIR__ . '/../vistas/formulario.php';
                break;

            case 4:
                // El problema 4 es automático, procesa directo en el modelo sin formulario previo
                $resultado = CalculosModel::problema4();
                include __DIR__ . '/../vistas/formulario.php';
                break;

            case 5:
                $resultado = null;
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if (!Utilidades::validarCSRF($_POST['csrf_token'] ?? '')) {
                        die('Error de seguridad: Violación de token Anti-CSRF detectada.');
                    }
                    $edades = [
                        (int)($_POST['e1'] ?? 0),
                        (int)($_POST['e2'] ?? 0),
                        (int)($_POST['e3'] ?? 0),
                        (int)($_POST['e4'] ?? 0),
                        (int)($_POST['e5'] ?? 0)
                    ];
                    $resultado = CalculosModel::problema5($edades);
                }
                include __DIR__ . '/../vistas/formulario.php';
                break;

            case 6:
                $resultado = null;
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if (!Utilidades::validarCSRF($_POST['csrf_token'] ?? '')) {
                        die('Error de seguridad: Violación de token Anti-CSRF detectada.');
                    }
                    $resultado = CalculosModel::problema6((float)($_POST['monto'] ?? 0));
                }
                include __DIR__ . '/../vistas/formulario.php';
                break;

            case 7:
                $resultado = null;
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if (!Utilidades::validarCSRF($_POST['csrf_token'] ?? '')) {
                        die('Error de seguridad: Violación de token Anti-CSRF detectada.');
                    }
                    // Convertimos la cadena separada por comas en un arreglo numérico limpio
                    $listaCruda = $_POST['lista_notas'] ?? '';
                    $notas = array_map('floatval', explode(',', $listaCruda));
                    $resultado = CalculosModel::problema7($notas);
                }
                include __DIR__ . '/../vistas/formulario.php';
                break;

            case 8:
                $resultado = null;
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if (!Utilidades::validarCSRF($_POST['csrf_token'] ?? '')) {
                        die('Error de seguridad: Violación de token Anti-CSRF detectada.');
                    }
                    $resultado = CalculosModel::problema8($_POST['fecha'] ?? '');
                }
                include __DIR__ . '/../vistas/formulario.php';
                break;

            case 9:
                $resultado = null;
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if (!Utilidades::validarCSRF($_POST['csrf_token'] ?? '')) {
                        die('Error de seguridad: Violación de token Anti-CSRF detectada.');
                    }
                    $resultado = CalculosModel::problema9((int)($_POST['base'] ?? 0));
                }
                include __DIR__ . '/../vistas/formulario.php';
                break;

            default:
                // Gestión de Errores Segura: Cualquier opción que no exista redirige al menú
                include __DIR__ . '/../vistas/menu.php';
                break;
        }
    }
}