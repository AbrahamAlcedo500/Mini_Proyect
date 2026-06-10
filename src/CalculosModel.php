<?php
namespace App;

class CalculosModel {

    /**
     * Problema 1: Calcular media, desviación estándar, min y máx de 5 números positivos.
     * Filtra los números para procesar únicamente los mayores a cero.
     */
    public static function problema1(array $numeros) {
        $positivos = array_filter($numeros, function($n) { return $n > 0; });
        $n = count($positivos);
        if ($n === 0) return null;

        $min = min($positivos);
        $max = max($positivos);
        $media = array_sum($positivos) / $n;

        // Desviación estándar muestral
        $sumaCuadrados = 0;
        foreach ($positivos as $x) {
            $sumaCuadrados += pow($x - $media, 2);
        }
        $desviacion = ($n > 1) ? sqrt($sumaCuadrados / ($n - 1)) : 0;

        return [
            'Cantidad de números válidos' => $n,
            'Valor Mínimo' => $min,
            'Valor Máximo' => $max,
            'Media Aritmética' => round($media, 4),
            'Desviación Estándar' => round($desviacion, 4)
        ];
    }

    /**
     * Problema 2: Calcular la suma de los números del 1 al 1,000 automáticamente.
     */
    public static function problema2() {
        $suma = 0;
        for ($i = 1; $i <= 1000; $i++) {
            $suma += $i;
        }
        return "La suma de todos los números del 1 al 1,000 es: " . $suma;
    }

    /**
     * Problema 3: Imprimir los N-primeros múltiplos de 4.
     */
    public static function problema3($n) {
        if ($n <= 0) return "Por favor, ingrese una cantidad mayor a 0.";
        
        $multiplos = [];
        for ($i = 1; $i <= $n; $i++) {
            $multiplos[] = 4 * $i;
        }
        return "Los primeros {$n} múltiplos de 4 son: " . implode(', ', $multiplos);
    }

    /**
     * Problema 4: Suma independiente de números pares e impares entre 1 y 200.
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
     * Problema 5: Clasificar la edad de 5 personas en categorías estadísticas.
     */
    public static function problema5(array $edades) {
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
     * Problema 6: Repartición proporcional del presupuesto anual del hospital.
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
     * Problema 7: Calculadora estadística basada en una lista dinámica de notas.
     */
    public static function problema7(array $notas) {
        // Limpiamos la lista eliminando valores vacíos o no numéricos
        $notasValidas = array_filter($notas, function($n) { return $n >= 0 && $n <= 100; });
        $n = count($notasValidas);
        if ($n === 0) return "No se ingresaron notas válidas (rango de 0 a 100).";

        $promedio = array_sum($notasValidas) / $n;
        $minima = min($notasValidas);
        $maxima = max($notasValidas);

        $sumaCuadrados = 0;
        foreach ($notasValidas as $nota) {
            $sumaCuadrados += pow($nota - $promedio, 2);
        }
        $desviacion = ($n > 1) ? sqrt($sumaCuadrados / ($n - 1)) : 0;

        return [
            'Total de Notas Evaluadas' => $n,
            'Nota Más Baja' => $minima,
            'Nota Más Alta' => $maxima,
            'Promedio del Grupo' => round($promedio, 2),
            'Desviación Estándar' => round($desviacion, 2)
        ];
    }

    /**
     * Problema 8: Devolver la estación del año de acuerdo a la fecha ingresada.
     */
    public static function problema8($fechaString) {
        $timestamp = strtotime($fechaString);
        if (!$timestamp) return "Fecha inválida.";
        
        $mes = (int)date('m', $timestamp);
        $dia = (int)date('d', $timestamp);

        // Lógica estricta basada en el cuadro del taller
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
     * Problema 9: Recibir número base (1 al 9) y generar sus primeras 15 potencias.
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