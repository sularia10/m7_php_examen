<?php
class Archivo {
    private $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;
        echo "Archivo '$nombre' abierto\n";
    }

    public function __destruct() {
        echo "Archivo '$this->nombre' cerrado\n";
    }
}

$archivo = new Archivo("datos.txt");
// Al terminar el script o destruir el objeto, se llamará al destructor
?>
