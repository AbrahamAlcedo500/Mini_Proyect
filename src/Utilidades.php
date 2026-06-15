<?php
namespace App;

class Utilidades {
    
    /**
     * Mitigación de Ataques XSS (Exigido en el Apéndice A de la guía)
     * Convierte caracteres especiales en entidades HTML seguras antes de imprimirlos.
     */
    public static function sanitizar($data) {
        return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
    }

    /**
     * Genera un token CSRF aleatorio y seguro para guardarlo en la sesión
     */
    public static function generarCSRF() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    /**
     * Valida si el token enviado por el formulario coincide exactamente con el de la sesión
     */
    public static function validarCSRF($tokenRecibido) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $tokenRecibido);
    }

    /**
     * Función estática para generar el enlace de regreso al menú principal de forma limpia
     */
    public static function enlaceVolver() {
        return '<a href="index.php" style="display:inline-block; margin-top:20px; color:#5a2d82; text-decoration:none; font-weight:bold;">← Volver al Menú Principal</a>';
    }
}