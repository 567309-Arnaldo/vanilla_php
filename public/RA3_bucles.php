<?php
// 1. FOR: desplegable de años de promoción
echo '<select name="promocion">';

for ($anio = 2020; $anio <= 2025; $anio++) {
    echo '<option value="', $anio, '">', $anio, '</option>';
}

echo '</select>';


// 2. WHILE: años necesarios para completar el ciclo
$horasCiclo    = 2000;
$horasPorAnio  = 700;
$horasCursadas = 0;
$anios         = 0;

// El bucle realiza 3 iteraciones: 700, 1400 y 2100 horas.
while ($horasCursadas < $horasCiclo) {
    $horasCursadas += $horasPorAnio;
    $anios++;
}

echo '<p>Años necesarios: ', $anios, '</p>';


// 3. FOREACH: listado de currículos
$curriculos = [
    ['alumno' => 'Ana López',    'ciclo' => 'DAW',  'video' => 'https://youtu.be/curriculo1'],
    ['alumno' => 'Marcos Pérez', 'ciclo' => 'DAM',  'video' => 'https://youtu.be/curriculo2'],
    ['alumno' => 'Laura García', 'ciclo' => 'ASIR', 'video' => 'https://youtu.be/curriculo3'],
];

echo '<ul>';

foreach ($curriculos as $curriculo) {
    echo '<li class="curriculo">', $curriculo['alumno'], ' — ', $curriculo['ciclo'], '</li>';
}

echo '</ul>';


// 4. FOREACH con clave y valor
$curriculo = [
    'alumno' => 'Ana López',
    'ciclo' => 'DAW',
    'video' => 'https://youtu.be/curriculo1'
];

echo '<dl>';

foreach ($curriculo as $campo => $valor) {
    echo '<dt>', $campo, '</dt><dd>', $valor, '</dd>';
}

echo '</dl>';


// 5. CONTINUE y sintaxis alternativa
$curriculosPublicados = [
    ['alumno' => 'Ana López',    'ciclo' => 'DAW',  'video' => 'https://youtu.be/curriculo1'],
    ['alumno' => 'Marcos Pérez', 'ciclo' => 'DAM',  'video' => 'https://youtu.be/curriculo2'],
    ['alumno' => 'Pablo Ruiz',   'ciclo' => 'DAW',  'video' => ''],
    ['alumno' => 'Laura García', 'ciclo' => 'ASIR', 'video' => 'https://youtu.be/curriculo3'],
];
?>

<table>
    <tr>
        <th>Alumno</th>
        <th>Vídeo</th>
    </tr>

    <?php foreach ($curriculosPublicados as $curriculo): ?>
        <?php if ($curriculo['video'] === '') { continue; } ?>
        <tr class="con-video">
            <td><?= $curriculo['alumno'] ?></td>
            <td><a href="<?= $curriculo['video'] ?>">vídeo</a></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
// Se generan 3 filas con la clase "con-video".
// Pablo Ruiz no aparece porque su campo video está vacío.


// 6. INVESTIGACIÓN: max_execution_time
// Para consultar el límite configurado, se puede ejecutar en un script aparte:
// echo ini_get('max_execution_time');
//
// max_execution_time establece el tiempo máximo de ejecución de un script PHP.
// Si un script entra en un bucle infinito, puede superar el límite y terminar
// con un error de tiempo máximo de ejecución.
// Este límite evita que un script bloquee recursos del servidor indefinidamente.
?>