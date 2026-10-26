<?php
// 1. Tipos y variables
$codCiclo  = "DAW";     // string
$horas     = 2000;      // int
$notaCorte = 8.75;      // float
$activo    = true;      // bool

echo '<p>', $codCiclo, ' — ', $horas, ' horas — nota de corte ', $notaCorte, '</p>';

echo '<pre>';
var_dump($codCiclo, $horas, $notaCorte, $activo);
echo '</pre>';

// 2. Constantes
define('NOMBRE_CENTRO', 'CIFP Carlos III');
const CODIGO_CENTRO = '30012345';

echo '<p>Centro: ', NOMBRE_CENTRO, ' (código ', CODIGO_CENTRO, ')</p>';

// 3. Operadores
$horasTotales  = 2000;
$horasCursadas = 1350;

echo '<p>Horas restantes: ', $horasTotales - $horasCursadas, '</p>';

$codCiclo = "10";   // string
$idCiclo  = 10;     // int

// Resultado esperado:
// == devuelve true porque compara los valores convirtiendo los tipos.
// === devuelve false porque compara tanto el valor como el tipo.

echo '<pre>';
var_dump($codCiclo == $idCiclo);
var_dump($codCiclo === $idCiclo);
echo '</pre>';

// 4. Investigación: operador spaceship (<=>)
// Compara dos valores y devuelve -1 si el primero es menor,
// 0 si ambos son iguales o 1 si el primero es mayor.
// Se relaciona con los operadores <, > y ==, pero devuelve un resultado
// numérico que indica el orden relativo de los dos valores.

var_dump(5 <=> 10); // int(-1)
var_dump(5 <=> 5);  // int(0)
var_dump(10 <=> 5); // int(1)
?>