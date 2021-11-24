<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            "department_id"=>3,
            'name' => "Mohammed Errir",
            'email' => "mohammed.erriri@vitalcareprod.com",
            'password' => Hash::make("azerty123"),
            'phone_number' => "0770301603",
        ]);

        $user->admin()->create([

        ]);

        $user->assignRole('Admin');
    }
}
