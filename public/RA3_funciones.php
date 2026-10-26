<?php
declare(strict_types=1);

require_once __DIR__ . '/../src/RA3_funciones.php';

$curriculos = [
    ['alumno' => 'Marcos Pérez', 'ciclo' => 'DAM',  'video' => 'https://youtu.be/curriculo2'],
    ['alumno' => 'Laura García', 'ciclo' => 'ASIR', 'video' => null],
    ['alumno' => 'Ana López',    'ciclo' => 'DAW',  'video' => 'https://youtu.be/curriculo1'],
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Funciones PHP - marcapersonalFP</title>
</head>
<body>
    <h1>marcapersonalFP — Funciones</h1>

    <p>Horas restantes: <?= horasRestantes(2000, 1350) ?></p>
    <p>Titulación: <?= titulacion() ?></p>

    <ul>
        <?php foreach (ordenarPorAlumno($curriculos) as $curriculo): ?>
            <li class="curriculo"><?= $curriculo['alumno'] ?> — <?= enlaceVideo($curriculo['video']) ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>