<?php
declare(strict_types=1);

require_once __DIR__ . '/../src/RA3_formularios.php';
require_once __DIR__ . '/../src/ValidadorCurriculo.php';

const NOMBRE_CENTRO = 'CIFP Carlos III';

// Catálogo de ciclos del centro. En el Bloque 6 saldrá de la base de datos.
$ciclos = [
    'DAW'  => new Ciclo(1, 'DAW', 'Desarrollo de Aplicaciones Web', Ciclo::GRADO_SUPERIOR),
    'DAM'  => new Ciclo(2, 'DAM', 'Desarrollo de Aplicaciones Multiplataforma', Ciclo::GRADO_SUPERIOR),
    'ASIR' => new Ciclo(3, 'ASIR', 'Administración de Sistemas Informáticos en Red', Ciclo::GRADO_SUPERIOR),
    'SMR'  => new Ciclo(4, 'SMR', 'Sistemas Microinformáticos y Redes', Ciclo::GRADO_MEDIO),
];

$validador = new ValidadorCurriculo($ciclos);
$datos = [];
$errores = [];
$curriculo = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = $_POST;
    $errores = $validador->validar($datos);

    if ($errores === []) {
        // Sin base de datos no hay quien asigne el id: usamos 1 (Bloque 6).
        $curriculo = $validador->crearCurriculo($datos, 1);
    }
}

/*
EJERCICIO 3: PRUEBAS DE VALIDACIÓN

1. Enviar el formulario vacío:
   Aparece "El nombre del alumno es obligatorio." y
   "Elige uno de los ciclos de la lista.".
   Las reglas se encuentran en validar(): el nombre no puede estar vacío
   y el código del ciclo debe existir en el catálogo.

2. Nombre "  Ana López  ":
   trim() elimina los espacios iniciales y finales. El resultado muestra
   "Ana López".

3. Vídeo http://youtu.be/curriculo1:
   Se rechaza porque no comienza por https://.

   Vídeo javascript:alert('XSS'):
   Se rechaza porque no es una URL válida según FILTER_VALIDATE_URL
   y tampoco comienza por https://.

   No basta con type="url" porque la validación del navegador puede
   desactivarse o evitarse enviando una petición HTTP directamente.
   El servidor debe validar siempre los datos.

4. Si se cambia el value de una opción del desplegable por FP:
   Se rechaza porque FP no existe como clave del catálogo $ciclos.

5. Datos correctos con vídeo:
   Se crea el objeto Curriculo con la URL validada.

   Datos correctos sin vídeo:
   El objeto Curriculo recibe null en videoCurriculum.
*/

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de currículo — <?= e(NOMBRE_CENTRO) ?></title>
</head>
<body>
    <h1><?= e(NOMBRE_CENTRO) ?> — Alta de currículo</h1>

    <?php if ($curriculo !== null): ?>
        <section class="resultado">
            <h2>Currículo validado</h2>

            <p class="exito"><?= e($curriculo->descripcion()) ?></p>

            <p>
                Ciclo: <?= e($curriculo->ciclo->nombre) ?> —
                titulación de <?= e($curriculo->ciclo->titulacion()) ?>
            </p>

            <p>
                Vídeo:
                <?php if ($curriculo->videoCurriculum !== null): ?>
                    <a href="<?= e($curriculo->videoCurriculum) ?>">ver vídeo</a>
                <?php else: ?>
                    sin vídeo
                <?php endif; ?>
            </p>

            <p><a href="RA3_altaCurriculo.php">Dar de alta otro currículo</a></p>
        </section>
    <?php else: ?>

        <?php if ($errores !== []): ?>
            <ul class="errores">
                <?php foreach ($errores as $error): ?>
                    <li><?= e($error) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <form action="RA3_altaCurriculo.php" method="post">
            <p>
                <label>
                    Alumno
                    <input name="alumno" value="<?= e($datos['alumno'] ?? '') ?>">
                </label>
            </p>

            <p>
                <label>
                    Ciclo
                    <select name="ciclo">
                        <option value="">— Elige un ciclo —</option>
                <?php foreach ($ciclos as $codigo => $ciclo): ?>
                    <option value="<?= e($codigo) ?>"<?= ($datos['ciclo'] ?? '') === $codigo ? ' selected' : '' ?>><?= e($ciclo->descripcion()) ?></option>
                <?php endforeach; ?>
                    </select>
                </label>
            </p>

            <p>
                <label>
                    Vídeo de presentación (opcional)
                    <input
                        name="video"
                        type="url"
                        value="<?= e($datos['video'] ?? '') ?>"
                    >
                </label>
            </p>

            <button type="submit">Dar de alta</button>
        </form>
    <?php endif; ?>
</body>
</html>

<?php
/*
EJERCICIO 4: EQUIVALENCIA EN LARAVEL

Las reglas de validación equivalentes se expresarían así:

$request->validate([
    'alumno' => ['required', 'string', 'max:100'],
    'ciclo'  => ['required', 'in:DAW,DAM,ASIR,SMR'],
    'video'  => ['nullable', 'url', 'starts_with:https://'],
]);

required exige un valor obligatorio.
string exige una cadena.
max:100 limita el nombre a 100 caracteres.
in restringe el ciclo a los códigos permitidos.
nullable permite que el vídeo esté vacío.
url comprueba que el vídeo tenga formato de URL.
starts_with:https:// exige el prefijo HTTPS.

En una aplicación real, los códigos de in deberían proceder del catálogo
de ciclos disponible en la aplicación.
*/
?>