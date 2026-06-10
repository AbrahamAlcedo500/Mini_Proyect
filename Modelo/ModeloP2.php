<?php
class ModeloP2 {
    public static function calcularSuma() {
        $suma = 0;
        $pasos = []; // Aquí guardamos la simulación

        for ($i = 1; $i <= 1000; $i++) {
            $suma += $i;
            
            // Guardamos solo los primeros 5 pasos para la demostración visual
            if ($i <= 5) {
                $pasos[] = [
                    'iteracion' => $i,
                    'operacion' => ($suma - $i) . " + " . $i,
                    'acumulado' => $suma
                ];
            }
        }

        // Devolvemos tanto los pasos simulados como el gran total
        return [
            'pasos' => $pasos,
            'total' => $suma
        ];
    }
}
?>