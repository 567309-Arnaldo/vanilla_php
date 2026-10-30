<?php
 declare(strict_types=1);

 require_once __DIR__ . '/../src/RA4_comun.php';

 iniciarSesion();

 // Si ya hay alguien identificado, no tiene sentido volver a pedirle las credenciales.
 if (usuarioActual() !== null) {
     header('Location: RA4_perfil.php', true, 303);
     exit;
 }

 $email = '';
 $error = null;

 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     $email    = trim($_POST['email'] ?? '');
     $password = $_POST['password'] ?? '';

     $usuario = (new Autenticador(usuarios()))->autenticar($email, $password);

     if ($usuario === null) {
         // El mismo mensaje tanto si falla el email como si falla la contraseña.
         $error = 'Email o contraseña incorrectos.';
     } else {
         // Identificador de sesión nuevo al iniciar sesión: evita la fijación de sesión.
         session_regenerate_id(true);
         $_SESSION['usuario'] = $usuario;
         $_SESSION['mensaje'] = 'Hola, ' . $usuario['firstName'] . '. Has iniciado sesión.';

         header('Location: RA4_perfil.php', true, 303);
         exit;
     }
 }
 ?>
 <!DOCTYPE html>
 <html lang="es">
 <head>
   <meta charset="UTF-8">
   <title>Iniciar sesión — <?= NOMBRE_CENTRO ?></title>
 </head>
 <body>
   <h1><?= NOMBRE_CENTRO ?> — Iniciar sesión</h1>

   <?php if ($error !== null): ?>
     <p class="error"><?= e($error) ?></p>
   <?php endif; ?>

   <form action="RA4_login.php" method="post">
     <p>
       <label>Email
         <input name="email" type="email" value="<?= e($email) ?>">
       </label>
     </p>
     <p>
       <label>Contraseña
         <input name="password" type="password">
       </label>
     </p>
     <button type="submit">Entrar</button>
   </form>
 </body>
 </html>

 <?php

/* 
EJERCICIO 6:
 
a) Abre http://localhost/RA4_perfil.php sin haber iniciado sesión. ¿Qué código de estado tiene la respuesta y adónde te lleva?
El servidor devuelve un código de estado "302 Found" (Redirección temporal). El navegador procesa la cabecera 'Location: RA4_login.php' enviada por la función 
 exigirLogin() y nos redirige automáticamente a la página de inicio de sesión (RA4_login.php).

b) Intenta entrar con una contraseña incorrecta, y después con un email que no existe. ¿Cambia el mensaje? ¿Qué queda escrito en el formulario?
El mensaje NO cambia; en ambos casos muestra exactamente el mismo texto: 
"Email o contraseña incorrectos.". Esto es una buena práctica de seguridad para no dar 
 pistas a posibles atacantes sobre si un email está registrado o no.
En el formulario queda escrito el Email que introdujo el usuario (gracias a la variable 
<?= e($email) ?>), pero el campo de la Contraseña se limpia por completo por seguridad.
 
c) Antes de entrar con los datos correctos, apunta el valor de la cookie PHPSESSID. Entra, y compáralo con el nuevo. ¿Por qué ha cambiado?
El valor ha cambiado por completo. Cambia debido a la instrucción 
session_regenerate_id(true); ejecutada justo después de verificar las credenciales. 
Su objetivo principal es mitigar los ataques de "Fijación de Sesión" (Session Fixation), 
asegurando que el identificador de un usuario anónimo no sea el mismo que el de un 
 usuario autenticado.

d) Ya dentro, vuelve a RA4_login.php. ¿Qué ocurre?
El navegador realiza una redirección con código "303 See Other" hacia RA4_perfil.php. El código del login detecta mediante usuarioActual() !== null que 
 ya hay una sesión activa válida, por lo que impide volver a rellenar el formulario.

e) Cierra la sesión y pulsa el botón Atrás del navegador para volver a RA4_perfil.php. Si ves la página, recárgala con F5: ¿qué pasa ahora?
Al pulsar el botón "Atrás", es probable que veas los datos del perfil de forma estática debido a que el navegador muestra una copia en caché (local) de 
la petición anterior. Sin embargo, al pulsar F5 para forzar una nueva petición al servidor, este comprueba que la sesión fue destruida en RA4_logout.php, 
por lo que exigirLogin() actúa y nos expulsa de nuevo a RA4_login.php.

g) Entra como Elena Ruiz. ¿Qué rol aparece?
Aparece el rol "docente", cargado correctamente desde el array de usuarios asociado a su dirección de correo electrónico 'elena.ruiz@marcapersonalfp.test'.
 
EJERCICIO 7:

Guardar el email y la contraseña en una cookie es peligroso porque si alguien roba la cookie, obtiene tus credenciales reales para siempre y podría usarlas en 
otras páginas. La forma segura de hacerlo es la siguiente:
En el navegador (Cookie): Se guarda un token aleatorio único (una cadena de texto larga y secreta) protegido con las propiedades HttpOnly (para que los virus 
no la lean) y Secure (solo viaja por HTTPS). En el servidor (Base de datos): Solo se guarda el hash (la huella digital cifrada) de ese token, asociado al ID 
del usuario. Cuando vuelves a la web, el navegador envía el token, el servidor calcula su hash, lo busca en la base de datos y, si coincide, te deja entrar 
sin pedirte la contraseña. Si un atacante roba la base de datos, solo verá hashes inservibles que no le permitirán adivinar los tokens reales.
*/