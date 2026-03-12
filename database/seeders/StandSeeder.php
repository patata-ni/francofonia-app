<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Stand;

class StandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stands = [
            [
                'nombre' => 'Crepê',
                'platillo' => 'Crepa',
                'descripcion' => 'Delicada crepa francesa, un clásico de la gastronomía gala.',
                'encargado' => 'Adriana García Malpica',
            ],
            [
                'nombre' => 'La Madeleine à la Veilleuse',
                'platillo' => 'Magdalena',
                'descripcion' => 'Tradicional magdalena francesa, suave y esponjosa.',
                'encargado' => 'Alexa Sinaí Santiago Villanueva',
            ],
            [
                'nombre' => 'Quiche Lorraine',
                'platillo' => 'Pastel',
                'descripcion' => 'Pastel salado de origen francés con huevo, crema y tocino.',
                'encargado' => 'Mildred Zoé Gómez Bautista',
            ],
            [
                'nombre' => 'Croquenbouche',
                'platillo' => 'Profiterol',
                'descripcion' => 'Torre de profiteroles cubiertos de caramelo, un postre espectacular.',
                'encargado' => 'José Emilio Hernández Romero',
            ],
            [
                'nombre' => 'Crème Brûlée',
                'platillo' => 'Crema flameada',
                'descripcion' => 'Crema pastelera con una crujiente capa de caramelo flameado.',
                'encargado' => 'Selina Maldonado López',
            ],
            [
                'nombre' => 'Canapé',
                'platillo' => 'Canape',
                'descripcion' => 'Elegantes bocadillos franceses sobre pan tostado.',
                'encargado' => 'Alondra Pardiñas Ordoñez',
            ],
            [
                'nombre' => 'Croque Monsieur y Croque Madame',
                'platillo' => 'Sandwich',
                'descripcion' => 'Sándwich francés gratinado con jamón y queso, clásico de la cocina parisina.',
                'encargado' => 'José Guadalupe Rivera Quezada',
            ],
            [
                'nombre' => 'Croissant',
                'platillo' => 'Pan',
                'descripcion' => 'Icónico pan hojaldrado francés, crujiente por fuera y suave por dentro.',
                'encargado' => 'Ivan Atzin Santes',
            ],
        ];

        foreach ($stands as $stand) {
            Stand::updateOrCreate(
                ['nombre' => $stand['nombre']],
                $stand
            );
        }
    }
}
