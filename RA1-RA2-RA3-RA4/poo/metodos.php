<?php
class Calculadora {
    public static $pi = 3.1416;

    public static function calcularAreaCirculo($radio) {
        return self::$pi * $radio * $radio;
    }
}

echo Calculadora::$pi;                  // 3.1416
echo Calculadora::calcularAreaCirculo(2);  // 12.5664
?>
