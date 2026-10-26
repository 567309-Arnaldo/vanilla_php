<?php
// 1. Ámbito local
function mostrarCiclo() {
    $nombreCiclo = "Desarrollo de Aplicaciones Web";
    echo '<p>', $nombreCiclo, '</p>';
}

mostrarCiclo();

// La variable es local a mostrarCiclo() y no existe fuera de la función.
// Si descomentamos la siguiente línea, PHP muestra un aviso porque
// $nombreCiclo solo está definida dentro de mostrarCiclo().

// echo $nombreCiclo;


// 2. Ámbito global con global
$totalCiclosMostrados = 0;

function registrarVisita() {
    global $totalCiclosMostrados;
    $totalCiclosMostrados++;
}

registrarVisita();
registrarVisita();
registrarVisita();

echo '<p>Ciclos mostrados: ', $totalCiclosMostrados, '</p>';


// 3. Constantes y ámbito
define('NOMBRE_CENTRO', 'CIFP Carlos III');

function pie() {
    // Las constantes son accesibles desde cualquier función sin global.
    echo '<footer>', NOMBRE_CENTRO, '</footer>';
}

pie();


// 4. Variables estáticas
function contadorVisitas() {
    static $visitas = 0;
    $visitas++;
    echo '<p>Visita número ', $visitas, '</p>';
}

contadorVisitas();
contadorVisitas();
contadorVisitas();

// El contador vuelve a empezar por 1 al recargar la página porque cada
// petición HTTP ejecuta el script desde cero. static conserva el valor
// entre llamadas a la función durante una misma ejecución,
// pero no entre peticiones distintas.


// 5. Investigación: variables superglobales
// Son variables predefinidas de PHP accesibles desde cualquier ámbito,
// sin necesidad de utilizar global.
// Ejemplos: $_GET, $_POST y $_SERVER.
// Su ámbito se parece al de las constantes porque ambas pueden utilizarse
// dentro de funciones sin declararlas con global, aunque son mecanismos distintos.
?>