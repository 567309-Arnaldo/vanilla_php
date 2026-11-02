<?php
declare(strict_types=1);

 require_once __DIR__ . '/../src/RA4_comun.php';
 require_once __DIR__ . '/../src/RA4_depuracion.php';

 $ciclos = catalogoCiclos();
 $curriculos = [
     new Curriculo(1, 'Ana López', $ciclos['DAW'], 'https://youtu.be/curriculo1'),
     new Curriculo(2, 'Marcos Pérez', $ciclos['DAM'], 'https://youtu.be/curriculo2'),
     new Curriculo(3, 'Laura García', $ciclos['ASIR'], 'https://youtu.be/curriculo3'),
     new Curriculo(4, 'Lucía Martín', $ciclos['DAW']),
 ];

 $cuenta = contarPorCiclo($curriculos);
 $total  = count($curriculos);
 ?>
 <!DOCTYPE html>
 <html lang="es">
 <head>
   <meta charset="UTF-8">
   <title>Resumen — <?= NOMBRE_CENTRO ?></title>
 </head>
 <body>
   <h1><?= NOMBRE_CENTRO ?> — Currículos por ciclo</h1>
   <ul>
     <?php foreach ($cuenta as $codigo => $numero): ?>
       <li><?= e($codigo) ?>: <?= $numero ?> (<?= porcentaje($numero, $total) ?> %)</li>
     <?php endforeach; ?>
   </ul>
   <p>Total: <?= $total ?> currículos.</p>
 </body>
 </html>

 /*
 Ejercicio 4

 ¿Qué ocurre en la vuelta de Lucía Martín?
En la vuelta de Lucía Martín (que es el segundo currículo de 'DAW'), el valor asignado a $cuenta['DAW'] vuelve a ser 1 en lugar de 2.
• El motivo: Se está utilizando el operador de post-incremento ($cuenta[$codigo]++). Este operador primero devuelve el valor actual 
(que era 1) para realizar la asignación y después incrementa la variable. Por lo tanto, se vuelve a asignar un 1 a la posición del array, 
anulando el incremento.
¿Qué diferencia hay?
• intdiv($parte, $total): Realiza una división entera. Al dividir, por ejemplo, 2 / 4, el resultado matemático es 0.5, por lo que la 
parte entera es 0. Al multiplicarlo después por 100 (0 * 100), el porcentaje resultante siempre da 0 %.
• $parte / $total: Realiza una división de punto flotante. Siguiendo el mismo ejemplo, devuelve correctamente 0.5, que al multiplicarse 
por 100 resulta en 50.

Ejercicio 5

¿Qué muestra la Pila de llamadas: desde dónde se ha llamado a tu función?
La Pila de llamadas muestra que tu función ha sido invocada desde el entorno de ejecución de PHPUnit. El orden ascendente (de lo más reciente a 
lo más antiguo) se estructurará de la siguiente forma:
1. contarPorCiclo() (fichero RA4_depuracion.php)
2. El método de prueba correspondiente dentro de la clase RA4_3_XdebugTest (fichero tests/RA4_3_XdebugTest.php)
3. El corredor interno de comandos y componentes de vendor/bin/phpunit.

 Ejercicio 6

¿Qué devuelve tu porcentaje() corregida si $total vale 0? 
Pruébalo en la consola de depuración y busca en la documentación de PHP qué es DivisionByZeroError. 
¿Cómo protegerías la función? Responde en un comentario (el test no lo comprueba).
Si $total vale 0, la operación de división ($parte / $total) provoca un error fatal de tipo DivisionByZeroError, el cual interrumpe por completo 
la ejecución del script.
Para proteger la función, se debe añadir una estructura de control condicional que valide el parámetro $total antes de proceder con el cálculo:


function porcentaje(int $parte, int $total): int {
    // PROTECCIÓN: Si el total es 0, evitamos la división devolviendo un 0 por defecto
    if ($total === 0) {
        return 0;
    }
    return (int) round(($parte / $total) * 100);
}
 */