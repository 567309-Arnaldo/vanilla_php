<?php
$linea = fgets(STDIN);                                              // Aqui recoge los valores por teclado
$datos = explode(" ", trim($linea));                                // Almacena los valores en el array datos
$indice = 0;                                                        // Posicion del indice
$suma = 0;                                                          // Calculo a realizar
  while ($indice < count($datos) && $datos[$indice] != 0) {         // Comprueba cuando indice es menor del conteo de datos y el dato no es 0
    $suma += $datos[$indice];                                       // Suma los datos y
    $indice++;                                                      // Sumamos una posicion al indice
  }
  echo "<p>Se han sumado $indice números, dando como resultado un total de $suma</p>";
?>


<?php
$linea = fgets(STDIN);
$datos = explode(" ", trim($linea));
$i = 0;
$j = 0;
?>
<table border="solid 1px">
<?php
  for ($i = 1; $i <= $datos[0]; $i++) {
?>
    <tr>
<?php
  for ($j = 1; $j <= $datos[1]; $j++) {
?>
        <td></td>
<?php
}
?>
    </tr>
<?php
}
?>
</table>