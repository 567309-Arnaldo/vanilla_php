<?php
declare(strict_types=1);

// EJERCICIO 1: COMENTARIOS PHP Y HTML

// Comentario de una línea: no llega al navegador.
# También de una línea, estilo consola.
/*
 * Comentario de varias líneas: tampoco llega al navegador.
 * Nota interna: revisar el texto de bienvenida.
 */

$titulo = 'Currículos del CIFP Carlos III';
?>

<!-- Comentario HTML: este sí llega al navegador. -->
<h1><?= $titulo ?></h1>

<?php
/*
EJERCICIO 1:
Solo el comentario HTML llega al navegador y puede verse mediante Ctrl+U.
Los comentarios PHP se eliminan en el servidor antes de enviar el HTML.

EJERCICIO 2:
Si se escribe ?> dentro de un comentario de una sola línea iniciado con //,
PHP interpreta ?> como el cierre del bloque PHP. El texto posterior se envía
al navegador como HTML y puede aparecer en la página.

Con un comentario de varias líneas, el símbolo ?> no cierra el bloque PHP
mientras se encuentre dentro del comentario. El comentario termina al
encontrar su delimitador de cierre.

EJERCICIO 3:
Los docblocks comienzan con /** y documentan funciones, clases y métodos.
La etiqueta @param describe los parámetros y @return el valor devuelto.
Pueden especificar estructuras internas de arrays que los tipos de PHP
no describen por sí solos. Los editores, PHPStan y otras herramientas
pueden interpretarlos, aunque PHP no comprueba su contenido al ejecutar.

EJERCICIO 4:
Los atributos de PHP 8 añaden metadatos estructurados mediante la sintaxis
#[...]. Por ejemplo, #[DataProvider('ciclos')] permite a PHPUnit identificar
un proveedor de datos para ejecutar pruebas.

No es un comentario porque #[ inicia la sintaxis de un atributo que PHP
reconoce. Sus metadatos pueden consultarse mediante reflexión.

Un docblock es un comentario de documentación que describe parámetros,
valores de retorno, tipos y comportamiento. PHP no ejecuta su contenido,
aunque los editores y analizadores estáticos pueden interpretarlo.

Los atributos contienen metadatos estructurados que PHP y las herramientas
pueden utilizar durante la ejecución. Los docblocks aportan documentación
textual. La respuesta se escribe en un comentario PHP porque es información
interna que no debe enviarse al navegador.
*/
?>