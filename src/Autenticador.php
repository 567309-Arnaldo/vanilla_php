<?php
 declare(strict_types=1);

 /**
  * Comprueba las credenciales (email y contraseña) de los usuarios.
  */
 class Autenticador
 {
     /**
      * @param array<string, array{firstName: string, lastName: string, rol: string, password: string}> $usuarios
      *        Usuarios indexados por su email; 'password' es el hash de la contraseña.
      */
     public function __construct(
         private readonly array $usuarios,
     ) {
     }

     /**
      * @return array{email: string, firstName: string, lastName: string, rol: string}|null
      *         Los datos del usuario (sin el hash) si las credenciales son correctas; null si no.
      */
     public function autenticar(string $email, string $password): ?array
     {
         $usuario = $this->usuarios[$email] ?? null;

         if ($usuario === null || !password_verify($password, $usuario['password'])) {
             return null;
         }

         return [
             'email'     => $email,
             'firstName' => $usuario['firstName'],
             'lastName'  => $usuario['lastName'],
             'rol'       => $usuario['rol'],
         ];
     }
 }

/* Los usuarios y las funciones comunes. Primero, genera el hash de cada contraseña de la tabla. Desde la carpeta laradock/:
[alumno@debian13-openbox:~/Documentos/laravel/laradock]$ docker compose exec workspace php -r "echo password_hash('ana-secreta', PASSWORD_DEFAULT), PHP_EOL;"
$2y$12$mbkL7pDXUjclNkKyB98gE.rl4jQ01DSRgczdxgaUxmqrHTie.6lGK
[alumno@debian13-openbox:~/Documentos/laravel/laradock]$ docker compose exec workspace php -r "echo password_hash('ana-secreta', PASSWORD_DEFAULT), PHP_EOL;"
$2y$12$tQqxv0yo1bXQ06TCGfnpHekCuFYkTlJqLTSBVT28AV43vRod1n6va
[alumno@debian13-openbox:~/Documentos/laravel/laradock]$ docker compose exec workspace php -r "echo password_hash('docente-secreta', PASSWORD_DEFAULT), PHP_EOL;"
$2y$12$fTsjJfaWOCKJj1shgUpwqukF1vLzSNSrVdtQCrXl6qjGSmoH.wlb6
[alumno@debian13-openbox:~/Documentos/laravel/laradock]$ docker compose exec workspace php -r "echo password_hash('docente-secreta', PASSWORD_DEFAULT), PHP_EOL;"
$2y$12$HW2lWenT6ZDKY7HNni.Fr.vnlaSWU.WMwJvqRqrGnnE4zneuATYz.
*/