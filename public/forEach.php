<?php
  $curriculos = [
    ['alumno' => 'Ana López',    'ciclo' => 'DAW',  'video' => 'https://youtu.be/curriculo1'],
    ['alumno' => 'Marcos Pérez', 'ciclo' => 'DAM',  'video' => 'https://youtu.be/curriculo2'],
    ['alumno' => 'Laura García', 'ciclo' => 'ASIR', 'video' => 'https://youtu.be/curriculo3'],
  ];

  echo '<ol>';
  foreach ($curriculos as $clave => $curriculo) {
    echo '<li class="curriculo" value="', $clave, '">', '<dl>';
    foreach ($curriculo as $campo => $valor) {
    echo '<dt>', $campo, '</dt><dd>', $valor, '</dd>';
    }
    echo '</dl>', '</li>';
  }
  echo '</ol>';
?>

