<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Participant;
use App\Models\User;
use App\Models\Stand;
use App\Models\Survey;
use App\Models\Visit;
use Carbon\Carbon;

class TestDataSeeder extends Seeder
{
    public function run(): void
    {
        // ── Participantes de prueba ──────────────────────────────
        $participantsData = [
            ['nombre' => 'María',    'paterno' => 'López',     'materno' => 'García',    'ciudad' => 'Gutiérrez Zamora', 'municipio' => 'Gutiérrez Zamora', 'sexo' => 'F', 'correo' => 'maria.lopez@gmail.com'],
            ['nombre' => 'Carlos',   'paterno' => 'Hernández', 'materno' => 'Ruiz',      'ciudad' => 'Papantla',         'municipio' => 'Papantla',         'sexo' => 'M', 'correo' => 'carlos.hdz@gmail.com'],
            ['nombre' => 'Ana',      'paterno' => 'Martínez',  'materno' => 'Flores',    'ciudad' => 'Tecolutla',        'municipio' => 'Tecolutla',        'sexo' => 'F', 'correo' => 'ana.martinez@hotmail.com'],
            ['nombre' => 'Luis',     'paterno' => 'Pérez',     'materno' => 'Sánchez',   'ciudad' => 'Poza Rica',        'municipio' => 'Poza Rica',        'sexo' => 'M', 'correo' => 'luis.perez@yahoo.com'],
            ['nombre' => 'Sofía',    'paterno' => 'Ramírez',   'materno' => 'Torres',    'ciudad' => 'Gutiérrez Zamora', 'municipio' => 'Gutiérrez Zamora', 'sexo' => 'F', 'correo' => 'sofia.ramirez@gmail.com'],
            ['nombre' => 'Diego',    'paterno' => 'Morales',   'materno' => 'Vega',      'ciudad' => 'Tuxpan',           'municipio' => 'Tuxpan',           'sexo' => 'M', 'correo' => 'diego.morales@outlook.com'],
            ['nombre' => 'Valentina','paterno' => 'Cruz',      'materno' => 'Mendoza',   'ciudad' => 'Papantla',         'municipio' => 'Papantla',         'sexo' => 'F', 'correo' => 'vale.cruz@gmail.com'],
            ['nombre' => 'Andrés',   'paterno' => 'Jiménez',   'materno' => 'Ortiz',     'ciudad' => 'Poza Rica',        'municipio' => 'Poza Rica',        'sexo' => 'M', 'correo' => 'andres.jimenez@gmail.com'],
            ['nombre' => 'Camila',   'paterno' => 'Reyes',     'materno' => 'Luna',      'ciudad' => 'Gutiérrez Zamora', 'municipio' => 'Gutiérrez Zamora', 'sexo' => 'F', 'correo' => 'camila.reyes@hotmail.com'],
            ['nombre' => 'Fernando', 'paterno' => 'Díaz',      'materno' => 'Campos',    'ciudad' => 'Tecolutla',        'municipio' => 'Tecolutla',        'sexo' => 'M', 'correo' => 'fernando.diaz@gmail.com'],
            ['nombre' => 'Isabella', 'paterno' => 'Vargas',    'materno' => 'Rojas',     'ciudad' => 'Tuxpan',           'municipio' => 'Tuxpan',           'sexo' => 'F', 'correo' => 'isabella.vargas@yahoo.com'],
            ['nombre' => 'Roberto',  'paterno' => 'Castillo',  'materno' => 'Guerrero',  'ciudad' => 'Papantla',         'municipio' => 'Papantla',         'sexo' => 'M', 'correo' => 'roberto.castillo@gmail.com'],
            ['nombre' => 'Daniela',  'paterno' => 'Soto',      'materno' => 'Herrera',   'ciudad' => 'Gutiérrez Zamora', 'municipio' => 'Gutiérrez Zamora', 'sexo' => 'F', 'correo' => 'daniela.soto@outlook.com'],
            ['nombre' => 'Javier',   'paterno' => 'Ríos',      'materno' => 'Aguirre',   'ciudad' => 'Poza Rica',        'municipio' => 'Poza Rica',        'sexo' => 'M', 'correo' => 'javier.rios@gmail.com'],
            ['nombre' => 'Renata',   'paterno' => 'Medina',    'materno' => 'Chávez',    'ciudad' => 'Tecolutla',        'municipio' => 'Tecolutla',        'sexo' => 'F', 'correo' => 'renata.medina@gmail.com'],
            ['nombre' => 'Emilio',   'paterno' => 'Guzmán',    'materno' => 'Rangel',    'ciudad' => 'Tuxpan',           'municipio' => 'Tuxpan',           'sexo' => 'M', 'correo' => 'emilio.guzman@hotmail.com'],
            ['nombre' => 'Lucía',    'paterno' => 'Fernández', 'materno' => 'Ibarra',    'ciudad' => 'Gutiérrez Zamora', 'municipio' => 'Gutiérrez Zamora', 'sexo' => 'F', 'correo' => 'lucia.fernandez@gmail.com'],
            ['nombre' => 'Sebastián','paterno' => 'Navarro',   'materno' => 'Delgado',   'ciudad' => 'Papantla',         'municipio' => 'Papantla',         'sexo' => 'M', 'correo' => 'sebastian.navarro@yahoo.com'],
            ['nombre' => 'Paula',    'paterno' => 'Estrada',   'materno' => 'Cortés',    'ciudad' => 'Poza Rica',        'municipio' => 'Poza Rica',        'sexo' => 'F', 'correo' => 'paula.estrada@gmail.com'],
            ['nombre' => 'Héctor',   'paterno' => 'Salazar',   'materno' => 'Peña',      'ciudad' => 'Gutiérrez Zamora', 'municipio' => 'Gutiérrez Zamora', 'sexo' => 'M', 'correo' => 'hector.salazar@outlook.com'],
        ];

        $stands = Stand::all();
        $counter = 1;

        foreach ($participantsData as $data) {
            $qrCode = 'FRANCO-' . str_pad($counter + 100, 6, '0', STR_PAD_LEFT);

            $participant = Participant::firstOrCreate(
                ['correo' => $data['correo']],
                array_merge($data, ['qr_code' => $qrCode])
            );

            // Crear usuario asociado
            User::firstOrCreate(
                ['email' => $data['correo']],
                [
                    'name' => $data['nombre'] . ' ' . $data['paterno'],
                    'email' => $data['correo'],
                    'password' => bcrypt($participant->qr_code),
                    'role' => 'user',
                ]
            );

            $counter++;
        }

        // ── Visitas de prueba ────────────────────────────────────
        $participants = Participant::all();
        $baseDate = Carbon::create(2026, 3, 20, 10, 0, 0);

        foreach ($participants as $participant) {
            // Cada participante visita entre 3 y 6 stands aleatorios
            $visitCount = rand(3, min(6, $stands->count()));
            $visitedStands = $stands->random($visitCount);
            $minuteOffset = 0;

            foreach ($visitedStands as $stand) {
                $minuteOffset += rand(5, 20);

                Visit::firstOrCreate([
                    'participant_id' => $participant->id,
                    'stand_id' => $stand->id,
                ], [
                    'visit_time' => $baseDate->copy()->addMinutes($minuteOffset + ($participant->id * 8)),
                ]);
            }
        }

        // ── Encuestas de prueba ──────────────────────────────────
        $comentarios = [
            '¡Excelente evento! Los platillos estuvieron deliciosos.',
            'Me encantó la crème brûlée, fue mi favorita de toda la feria.',
            'Muy buena organización, felicidades a todos los estudiantes.',
            'Los croissants estaban increíbles, como en una panadería francesa.',
            'Ojalá hagan más eventos así, la comida estuvo espectacular.',
            'El croquenbouche fue impresionante, tanto visualmente como de sabor.',
            'Bonita experiencia, aprendí mucho sobre la gastronomía francesa.',
            'Las crepas estuvieron muy ricas, me comí dos.',
            null,
            null,
            null,
            null,
            null,
            'Muy interesante conocer la cultura francófona a través de la comida.',
            null,
            'El quiche lorraine superó mis expectativas, exquisito.',
            null,
            'Gran ambiente, buena música y mejor comida. ¡Volveré!',
            null,
            'Los canapés estuvieron elegantes y sabrosos, muy profesional.',
        ];

        // Ratings predeterminados (variados, realistas)
        $ratings = [
            [5, 5, 4, 5, 5],
            [4, 5, 5, 4, 5],
            [5, 4, 4, 5, 4],
            [3, 4, 4, 3, 4],
            [5, 5, 5, 5, 5],
            [4, 3, 4, 4, 3],
            [5, 5, 5, 4, 5],
            [4, 4, 3, 4, 4],
            [5, 4, 5, 5, 4],
            [3, 3, 4, 3, 3],
            [5, 5, 4, 5, 5],
            [4, 4, 5, 4, 4],
            [5, 5, 5, 5, 4],
            [4, 5, 4, 4, 5],
            [3, 4, 3, 4, 3],
            [5, 4, 5, 5, 5],
            [4, 3, 4, 3, 4],
            [5, 5, 5, 5, 5],
            [4, 4, 4, 5, 4],
            [5, 5, 4, 4, 5],
        ];

        foreach ($participants as $index => $participant) {
            $i = $index % count($ratings);

            Survey::firstOrCreate(
                ['participant_id' => $participant->id],
                [
                    'q1' => $ratings[$i][0],
                    'q2' => $ratings[$i][1],
                    'q3' => $ratings[$i][2],
                    'q4' => $ratings[$i][3],
                    'q5' => $ratings[$i][4],
                    'comentarios' => $comentarios[$i] ?? null,
                ]
            );
        }

        if ($this->command) {
            $this->command->info('✓ Datos de prueba creados: ' . $participants->count() . ' participantes, visitas y encuestas.');
        }
    }
}
