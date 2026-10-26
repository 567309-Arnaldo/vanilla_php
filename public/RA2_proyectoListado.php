<?php
// 1. Constante del centro
define('NOMBRE_CENTRO', 'CIFP Carlos III');

// Array de currículos
$curriculos = [
    ['alumno' => 'Ana López',    'ciclo' => 'DAW',  'video' => 'https://youtu.be/curriculo1'],
    ['alumno' => 'Marcos Pérez', 'ciclo' => 'DAM',  'video' => 'https://youtu.be/curriculo2'],
    ['alumno' => 'Laura García', 'ciclo' => 'ASIR', 'video' => 'https://youtu.be/curriculo3'],
];

// 2. Función para mostrar un currículo
function mostrarCurriculo(array $curriculo) {
    echo '<li>', $curriculo['alumno'], ' — ', $curriculo['ciclo'],
         ' — <a href="', $curriculo['video'], '">vídeo</a></li>';
}

// 3. Listado de currículos
echo '<h1>', NOMBRE_CENTRO, ' — Currículos</h1>';
echo '<ul>';

mostrarCurriculo($curriculos[0]);
mostrarCurriculo($curriculos[1]);
mostrarCurriculo($curriculos[2]);

echo '</ul>';

// 4. Alternativa opcional con foreach:
// echo '<ul>';
// foreach ($curriculos as $curriculo) {
//     mostrarCurriculo($curriculo);
// }
// echo '</ul>';
?>