<?php
// 1. Crear, añadir y buscar
$ciclos = ['DAW', 'DAM'];
$ciclos[] = 'ASIR';

echo '<p>Número de ciclos: ', count($ciclos), '</p>';
echo '<p>', in_array('SMR', $ciclos, true) ? 'SMR ofertado' : 'SMR no ofertado', '</p>';


// 2. Arrays multidimensionales
$ciclo = [
    'codCiclo' => 'DAW',
    'nombre'   => 'Desarrollo de Aplicaciones Web',
    'modulos'  => [
        '0612' => 'Desarrollo web en entorno cliente',
        '0613' => 'Desarrollo web en entorno servidor',
        '0614' => 'Despliegue de aplicaciones web',
        '0615' => 'Diseño de interfaces web',
    ],
];

echo '<pre>';
print_r($ciclo);
echo '</pre>';

echo '<ul>';
foreach ($ciclo['modulos'] as $codigo => $nombre) {
    echo '<li class="modulo">', $codigo, ' — ', $nombre, '</li>';
}
echo '</ul>';


// 3. Extraer, ordenar y unir
$curriculos = [
    ['alumno' => 'Ana López',    'ciclo' => 'DAW',  'video' => 'https://youtu.be/curriculo1'],
    ['alumno' => 'Marcos Pérez', 'ciclo' => 'DAM',  'video' => 'https://youtu.be/curriculo2'],
    ['alumno' => 'Laura García', 'ciclo' => 'ASIR', 'video' => 'https://youtu.be/curriculo3'],
];

// Se espera el orden alfabético: Ana López, Laura García, Marcos Pérez.
$alumnos = array_column($curriculos, 'alumno');
sort($alumnos);

echo '<p>Alumnos: ', implode(', ', $alumnos), '</p>';


// 4. Desestructuración
['alumno' => $alumno, 'ciclo' => $codCiclo] = $curriculos[1];

echo '<p>Segundo currículo: ', $alumno, ' (', $codCiclo, ')</p>';


// 5. Copia de arrays
$copia = $curriculos;
$copia[] = ['alumno' => 'Pablo Ruiz', 'ciclo' => 'DAW', 'video' => ''];

echo '<p>Original: ', count($curriculos), ' · Copia: ', count($copia), '</p>';


// 6. Investigación: sort(), asort() y ksort()
$notas = [
    'Marcos Pérez' => 7.25,
    'Laura García' => 9,
    'Ana López' => 8.5
];

$notasSort = $notas;
sort($notasSort);

$notasAsort = $notas;
asort($notasAsort);

$notasKsort = $notas;
ksort($notasKsort);

echo '<h2>sort()</h2><pre>';
print_r($notasSort);
echo '</pre>';

echo '<h2>asort()</h2><pre>';
print_r($notasAsort);
echo '</pre>';

echo '<h2>ksort()</h2><pre>';
print_r($notasKsort);
echo '</pre>';

// sort() ordena por valor y renumera las claves numéricamente.
// asort() ordena por valor conservando las claves originales.
// ksort() ordena por clave y conserva la asociación entre clave y valor.
// sort() es problemático para las notas porque se pierde el nombre
// asociado a cada alumno.
?>