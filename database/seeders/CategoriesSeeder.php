<?php

namespace Database\Seeders;

use App\Models\sparePartCategory;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        sparePartCategory::create([
            'tag' => "Filtres",
        ]);

        sparePartCategory::create([
            'tag' => "hydraulique",
        ]);

        sparePartCategory::create([
            'tag' => "Pneumatique",
        ]);

        sparePartCategory::create([
            'tag' => "Mécnique",
        ]);

        sparePartCategory::create([
            'tag' => "Electrique",
        ]);
    }
}
