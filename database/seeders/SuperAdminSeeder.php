<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'department_id'=>1,
            'name' => "Medjadder Aimen",
            'email' => "aimen.medjadder@vitalcareprod.com",
            'password' => Hash::make("azerty123"),
            'phone_number' => "0770271561",
        ]);

        $user->superAdmin()->create([

        ]);

        $user->assignRole('Super Admin');

    }
}
