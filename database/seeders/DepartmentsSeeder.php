<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
            'designation' => "Direction Générale",
        ]);

        Department::create([
            'designation' => "Production",
        ]);

        Department::create([
            'designation' => "Maintenance",
        ]);

        Department::create([
            'designation' => "Assurance Qualité",
        ]);

        Department::create([
            'designation' => "Contrôle Qualité",
        ]);
    }
}
