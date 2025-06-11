<?php
class CuentaBancaria {
    private $saldo = 0;  // propiedad privada

    // Método público para depositar dinero
    public function depositar($monto) {
        if ($monto > 0) {
            $this->saldo += $monto;
        }
    }

    // Método público para obtener el saldo
    public function obtenerSaldo() {
        return $this->saldo;
    }
}

$cuenta = new CuentaBancaria();
$cuenta->depositar(100);
echo "Saldo: " . $cuenta->obtenerSaldo();  // Saldo: 100
?>
