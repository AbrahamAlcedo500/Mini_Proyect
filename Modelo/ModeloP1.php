<?php
// ModeloP1.php - Clase para la matemática del Problema 1

class ModeloP1 {

    // Método básico para calcular la media
    public static function calcularMedia($arreglo) {
        $suma = array_sum($arreglo);
        $cantidad = count($arreglo);
        
        $resultado = $suma / $cantidad;
        return $resultado;
    }

    // Método básico para calcular la desviación estándar
    public static function calcularDesviacion($arreglo, $media) {
        $cantidad = count($arreglo);
        $sumaVarianzas = 0;
        
        // Ciclo foreach de toda la vida para la sumatoria
        foreach ($arreglo as $num) {
            $sumaVarianzas += pow(($num - $media), 2);
        }
        
        $resultado = sqrt($sumaVarianzas / $cantidad);
        return round($resultado,2);
    }
}
?>