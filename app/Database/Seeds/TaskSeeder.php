<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class TaskSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create('es_ES'); 
        $states = ['pendiente', 'en progreso', 'completada'];

        for ($i = 0; $i < 45; $i++) {
            $data = [
                'title'       => $faker->sentence(3),
                'task_ds'     => $faker->paragraph(2),
                'task_state'  => $faker->randomElement($states),
                'created_at'  => $faker->dateTimeThisYear()->format('Y-m-d H:i:s'),
                'updated_at'  => $faker->dateTimeThisYear()->format('Y-m-d H:i:s'),
            ];

            $this->db->table('tasks')->insert($data);
        }
    }
}
