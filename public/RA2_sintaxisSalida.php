<?php
  $nombreCiclo = "Desarrollo de Aplicaciones Web";
  $familia     = "Informática y Comunicaciones";
  $horas       = 2000;

  echo '<p>El ciclo <strong>', $nombreCiclo, '</strong> pertenece a la familia de ', $familia, ' y tiene ', $horas, ' horas.</p>';

// 2. La misma ficha con print y concatenación
print '<p>El ciclo <strong>' . $nombreCiclo . '</strong> pertenece a la familia de ' . $familia . ' y tiene ' . $horas . ' horas.</p>';

// 3. print como expresión
$resultado = print "Hola";
echo $resultado;

// $resultado vale 1 porque print devuelve siempre el valor 1.
// echo no puede asignarse a una variable porque no es una expresión.

// 4. Investigación
// echo admite varios argumentos separados por comas, mientras que print
// solo admite uno. Esto hace que echo resulte más cómodo al mostrar
// varios valores sin necesidad de concatenarlos.
?>