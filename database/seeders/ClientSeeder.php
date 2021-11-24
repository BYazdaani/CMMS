<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            "department_id"=>2,
            'name' => "Test Client",
            'email' => "test.client@vitalcareprod.com",
            'password' => Hash::make("azerty123"),
            'phone_number' => "0770458632",
        ]);

        $user->Client()->create([

        ]);

        $user->assignRole('Client');
    }
}
