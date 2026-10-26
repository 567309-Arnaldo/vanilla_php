<?php
$linea = fgets(STDIN);
$datos = explode(" ", trim($linea));

  if ($datos[0] > $datos[1]) {
    echo 'El mayor valor es ' , $datos[0];
  } elseif ($datos[0] < $datos[1]) {
    echo 'El mayor valor es ' , $datos[1];
  } else {
    echo 'Pareja de ' , $datos[0];
  }


  <?php
$linea = fgets(STDIN);
$datos = explode(" ", trim($linea));

  if ($datos[0] > $datos[1]) {
    echo 'El jugador ganador es el 1 con ' , $datos[0];
  } elseif ($datos[0] < $datos[1]) {
    echo 'El jugador ganador es el 2 con ' , $datos[1];
  } else {
    echo 'Ha habido empate a ' , $datos[0];
  }

  