<?php
namespace App;

class CalculosModel {

    /**
     * MÉTODO REUTILIZABLE: Calcula la media aritmética.
     */
    private static function calcularMedia(array $valores): float {
        $n = count($valores);
        return $n > 0 ? array_sum($valores) / $n : 0;
    }

    /**
     * MÉTODO REUTILIZABLE: Calcula la desviación estándar muestral.
     * Evita la duplicación de código redundante.
     */
    private static function calcularDesviacion(array $valores, float $media): float {
        $n = count($valores);
        if ($n <= 1) return 0;

        $sumaCuadrados = 0;
        foreach ($valores as $x) {
            $sumaCuadrados += pow($x - $media, 2);
        }
        return sqrt($sumaCuadrados / ($n - 1));
    }

    /**
     * Problema 1: Media, desviación, min y max de 5 números positivos (incluye cero).
     */
    public static function problema1(array $numeros) {
        $validos = array_filter($numeros, function($n) { return $n >= 0; });
        $n = count($validos);
        
        if ($n !== 5) return "Error: Debe ingresar exactamente 5 números no-negativos.";

        $min = min($validos);
        $max = max($validos);
        $media = self::calcularMedia($validos);
        $desviacion = self::calcularDesviacion($validos, $media);

        return [
            'Cantidad de números válidos' => $n,
            'Valor Mínimo' => $min,
            'Valor Máximo' => $max,
            'Media Aritmética' => round($media, 4),
            'Desviación Estándar' => round($desviacion, 4)
        ];
    }

    /**
     * Problema 2: Suma automatizada de números del 1 al 1,000.
     */
    public static function problema2() {
        $suma = 0;
        for ($i = 1; $i <= 1000; $i++) {
            $suma += $i;
        }
        return "La suma de todos los números del 1 al 1,000 es: " . $suma;
    }

    /**
     * Problema 3: N primeros múltiplos de 4 (Máximo 50 según la guía).
     */
    public static function problema3($n) {
        if ($n <= 0) return "Por favor, ingrese una cantidad mayor a 0.";
        if ($n > 50) return "Error: La cantidad máxima permitida por la guía es 50.";
        
        $multiplos = [];
        for ($i = 1; $i <= $n; $i++) {
            $multiplos[] = 4 * $i;
        }
        return "Los primeros {$n} múltiplos de 4 son: " . implode(', ', $multiplos);
    }

    /**
     * Problema 4: Suma de pares e impares de 1 a 200 de forma independiente.
     */
    public static function problema4() {
        $pares = 0;
        $impares = 0;
        for ($i = 1; $i <= 200; $i++) {
            if ($i % 2 === 0) {
                $pares += $i;
            } else {
                $impares += $i;
            }
        }
        return [
            'Suma de números PARES (1 al 200)' => $pares,
            'Suma de números IMPARES (1 al 200)' => $impares
        ];
    }

    /**
     * Problema 5: Clasificación de exactamente 5 edades en rangos.
     */
    public static function problema5(array $edades) {
        if (count($edades) !== 5) return "Error: Debe ingresar exactamente 5 edades.";

        $categorias = ['Niños (0-12)' => 0, 'Adolescentes (13-17)' => 0, 'Adultos (18-64)' => 0, 'Adultos Mayores (65+)' => 0];
        foreach ($edades as $edad) {
            if ($edad >= 0 && $edad <= 12) $categorias['Niños (0-12)']++;
            elseif ($edad >= 13 && $edad <= 17) $categorias['Adolescentes (13-17)']++;
            elseif ($edad >= 18 && $edad <= 64) $categorias['Adultos (18-64)']++;
            elseif ($edad >= 65) $categorias['Adultos Mayores (65+)']++;
        }
        return $categorias;
    }

    /**
     * Problema 6: Distribución del presupuesto del hospital.
     */
    public static function problema6($presupuestoAnual) {
        if ($presupuestoAnual <= 0) return "El presupuesto debe ser una cantidad positiva.";
        
        return [
            'Presupuesto Total Asignado' => '$' . number_format($presupuestoAnual, 2),
            'Ginecología (40%)' => '$' . number_format($presupuestoAnual * 0.40, 2),
            'Traumatología (35%)' => '$' . number_format($presupuestoAnual * 0.35, 2),
            'Pediatría (25%)' => '$' . number_format($presupuestoAnual * 0.25, 2)
        ];
    }

    /**
     * Problema 7: Calculadora estadística avanzada con inyección de Rangos para la Gráfica.
     */
    public static function problema7(array $notas) {
        $notasValidas = array_filter($notas, function($n) { return $n >= 0 && $n <= 100; });
        $n = count($notasValidas);
        if ($n === 0) return "No se ingresaron notas válidas (rango de 0 a 100).";

        $promedio = self::calcularMedia($notasValidas);
        $desviacion = self::calcularDesviacion($notasValidas, $promedio);

        // Agrupación estricta por rangos solicitada en las especificaciones del proyecto
        $rangos = ['0-60' => 0, '61-70' => 0, '71-80' => 0, '81-90' => 0, '91-100' => 0];
        foreach ($notasValidas as $nota) {
            if ($nota <= 60) $rangos['0-60']++;
            elseif ($nota <= 70) $rangos['61-70']++;
            elseif ($nota <= 80) $rangos['71-80']++;
            elseif ($nota <= 90) $rangos['81-90']++;
            else $rangos['91-100']++;
        }

        return [
            'Total de Notas Evaluadas' => $n,
            'Nota Más Baja' => min($notasValidas),
            'Nota Más Alta' => max($notasValidas),
            'Promedio del Grupo' => round($promedio, 2),
            'Desviación Estándar' => round($desviacion, 2),
            'RangosGrafica' => $rangos
        ];
    }

    /**
     * Problema 8: Estación del año según la fecha.
     */
    public static function problema8($fechaString) {
        $timestamp = strtotime($fechaString);
        if (!$timestamp) return "Fecha inválida.";
        
        $mes = (int)date('m', $timestamp);
        $dia = (int)date('d', $timestamp);

        if (($mes == 12 && $dia >= 21) || ($mes == 1) || ($mes == 2) || ($mes == 3 && $dia <= 20)) {
            return "La estación para la fecha ingresada es: VERANO ☀️";
        } elseif (($mes == 3 && $dia >= 21) || ($mes == 4) || ($mes == 5) || ($mes == 6 && $dia <= 21)) {
            return "La estación para la fecha ingresada es: OTOÑO 🍂";
        } elseif (($mes == 6 && $dia >= 22) || ($mes == 7) || ($mes == 8) || ($mes == 9 && $dia <= 22)) {
            return "La estación para la fecha ingresada es: INVIERNO ❄️";
        } else {
            return "La estación para la fecha ingresada es: PRIMAVERA 🌸";
        }
    }

    /**
     * Problema 9: Primeras 15 potencias (Base entre 1 y 9).
     */
    public static function problema9($base) {
        if ($base < 1 || $base > 9) return "Error: La base debe estar estrictamente entre 1 y 9.";
        
        $potencias = [];
        for ($exponente = 1; $exponente <= 15; $exponente++) {
            $resultado = pow($base, $exponente);
            $potencias["{$base} elevado a la {$exponente}"] = number_format($resultado);
        }
        return $potencias;
    }
}