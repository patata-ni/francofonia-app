<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class ScannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Crea 1 usuario admin y 8 usuarios para scanners.
     */
    public function run(): void
    {
        // Usuario admin
        User::firstOrCreate(
            ['email' => 'admin@franco.mx'],
            [
                'name' => 'Administrador',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ]
        );

        // 8 usuarios scanner
        for ($i = 1; $i <= 8; $i++) {
            User::firstOrCreate(
                ['email' => "scanner{$i}@franco.mx"],
                [
                    'name' => "Scanner {$i}",
                    'password' => bcrypt('password'),
                    'role' => 'scanner',
                ]
            );
        }
    }
}
