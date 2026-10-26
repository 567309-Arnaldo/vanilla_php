<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>marcapersonalFP v0</title>
</head>
<body>
    <h1>Hola, marcapersonalFP</h1>

    <p>Esta página se ha generado el <?php echo date('d/m/Y H:i:s'); ?>.</p>

    <?php
    // Fuente vs. resultado:
    // El código PHP se ejecuta en el servidor y el navegador recibe el HTML generado.
    // Por eso, al ver el código fuente, no aparecen las etiquetas PHP, sino su resultado.

    // Mezcla HTML/PHP: mostramos el nombre del centro y el año actual.
    echo "<p>Bienvenido a marcapersonalFP en el año " . date('Y') . ".</p>";

    // Investigación: JSP también permite insertar código dinámico en páginas HTML.
    // A diferencia de PHP, JSP utiliza Java y necesita un servidor compatible con Java.
    ?>
</body>
</html>