<?php
/*
|--------------------------------------------------------------------------
| Seeder Principal: DatabaseSeeder
|--------------------------------------------------------------------------
| Este es el seeder MAESTRO que se ejecuta con: php artisan db:seed
| O también: php artisan migrate:fresh --seed (borra todo y re-crea)
|
| ¿QUÉ ES UN SEEDER?
|   Es un archivo que llena la BD con datos iniciales o de prueba.
|   No modifica la estructura (eso lo hacen las migraciones), solo inserta filas.
|
| ORDEN DE EJECUCIÓN:
|   1. StandSeeder → Crea los 8 estands del evento
|   2. TestDataSeeder → Crea 20 participantes + visitas + encuestas de prueba
|   3. Este archivo → Crea los 3 usuarios administrativos
|
| USUARIOS DE PRUEBA:
|   admin@franco.mx   / password → Administrador (tiene acceso total)
|   scanner@franco.mx / password → Escáner QR (solo ve la página de escaneo)
|   user@franco.mx    / password → Visitante demo (ve su dashboard)
|
| NO OLVIDAR: Cambiar las contraseñas antes de producción.
|   En producción nunca uses 'password' como contraseña real.
|--------------------------------------------------------------------------
*/

namespace Database\Seeders;

use Database\Seeders\ScannerSeeder;
use Database\Seeders\StandSeeder;
use Database\Seeders\TestDataSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Método principal del seeder. Ejecuta todo en orden.
     */
    public function run(): void
    {
        // 1. Primero crear los estands (deben existir antes de las visitas)
        $this->call(StandSeeder::class);

        // 2. Crear participantes, visitas y encuestas de prueba
        $this->call(TestDataSeeder::class);

        // 3. Crear usuario admin y 8 scanners
        $this->call(ScannerSeeder::class);
    }
}
