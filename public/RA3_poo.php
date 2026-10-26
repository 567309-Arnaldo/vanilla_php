<?php
declare(strict_types=1);

require_once __DIR__ . '/../src/Curriculo.php';

$daw = new Ciclo(
    1,
    'DAW',
    'Desarrollo de Aplicaciones Web',
    Ciclo::GRADO_SUPERIOR
);

$curriculo = new Curriculo(
    1,
    'Ana López',
    $daw,
    'https://youtu.be/curriculo1'
);

$mismoCurriculo = $curriculo;
$mismoCurriculo->publicar();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>POO - marcapersonalFP</title>
</head>
<body>
    <h1><?= $daw->descripcion() ?></h1>
    <p>Titulación: <?= $daw->titulacion() ?></p>
    <p><?= $curriculo->descripcion() ?>: <?= $curriculo->estaPublicado() ? 'publicado' : 'en borrador' ?></p>
</body>
</html>
<?php
// Se espera "publicado": ambas variables apuntan al mismo objeto.
// Un backed enum enum Grado: string permite asociar cada caso a un string
// y restringir el valor a los casos definidos, evitando strings arbitrarios.
// La propiedad podría declararse como Grado en vez de string y constantes.
?>