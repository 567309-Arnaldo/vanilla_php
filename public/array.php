<?php
  $estudiantes = [
    ['apellido' => 'López'],
    ['apellido' => 'Pérez'],
    ['apellido' => 'García'],
  ];
  
  $buscado = 'Lópe';
  $encontrado = false;    // Buscado

  foreach ($estudiantes as $estudiante) {   // Medio buscado
     
      if ($estudiante['apellido'] == $buscado) {    // Medio buscado
          $encontrado = true;   // Buscado
         
          break;    // Buscado
      }
  }
    if ($encontrado){
         echo "El apellido si esta";
        }else{
         echo "El apellido no si esta";
        }  
   
    ?>