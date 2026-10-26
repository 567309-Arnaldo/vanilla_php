<?php
function contadorVisitas(int &$numero) : int {
    return $numero++;
}

$numero = 0;

echo "<p>Usted ha visitado ".contadorVisitas($numero)." veces esta página</p>";

?>