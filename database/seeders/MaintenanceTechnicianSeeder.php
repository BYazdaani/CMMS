<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MaintenanceTechnicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => "Nassim SMAILIA",
            'email' => "nassim.smailia@vitalcareprod.com",
            'password' => Hash::make("azerty123"),
            'phone_number' => "0770276232",
            'function' => "Technicien Maintenance",
        ]);

        $user->maintenanceTechnician()->create([

        ]);

        $user->assignRole('Maintenance Technician');
    }
}
