<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(DepartmentsSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(SuperAdminSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(MaintenanceTechnicianSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(StockSiteSeeder::class);
    }
}
