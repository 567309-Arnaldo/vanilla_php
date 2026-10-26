<?php
// 1. if / elseif / else
$grado = 'Superior';

if ($grado === 'Superior') {
    echo '<p>Ciclo de Grado Superior: da acceso a la universidad.</p>';
} elseif ($grado === 'Medio') {
    echo '<p>Ciclo de Grado Medio: da acceso a un Grado Superior.</p>';
} else {
    echo '<p>Grado desconocido.</p>';
}

// 2. Condiciones compuestas
$videoCurriculum = 'https://youtu.be/curriculo1';
$textoCurriculum = '';

// Se espera: Currículo incompleto
if ($videoCurriculum !== '' && $textoCurriculum !== '') {
    echo '<p>Currículo completo</p>';
} elseif ($videoCurriculum !== '' || $textoCurriculum !== '') {
    echo '<p>Currículo incompleto</p>';
} else {
    echo '<p>Currículo vacío</p>';
}

// 3. match
$codFamilia = 'INF';

$familia = match ($codFamilia) {
    'INF' => 'Informática y Comunicaciones',
    'ADG' => 'Administración y Gestión',
    'COM' => 'Comercio y Marketing',
    default => 'Familia desconocida',
};

echo '<p>Familia profesional: ', $familia, '</p>';

// 4. Operador ternario
$grado = 'Superior';
$titulo = $grado === 'Superior' ? 'Técnico Superior' : 'Técnico';

echo '<p>Titulación: ', $titulo, '</p>';

// Operador ??
$curriculo = ['alumno' => 'Ana López', 'ciclo' => 'DAW'];

echo '<p>Vídeo: ', $curriculo['video'] ?? 'Sin vídeo de presentación', '</p>';

// 5. Sintaxis alternativa
$publicado = true;
?>

<?php if ($publicado): ?>
    <p class="estado">Currículo publicado</p>
<?php else: ?>
    <p class="estado">Currículo en borrador</p>
<?php endif; ?>

<?php
// 6. Investigación: conversión a booleano
// '0' se convierte en false y muestra "no".
// '0.0' se convierte en true y muestra "sí".
// También se convierten en false: false, 0, 0.0, '', [], null y '0'.
// Preferimos comparaciones explícitas para evitar conversiones inesperadas.
?>