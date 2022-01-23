<?php

namespace Database\Seeders;

use App\Models\stockSite;
use Illuminate\Database\Seeder;

class StockSiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        stockSite::create([
            'designation' => "atelier maintenance",
        ]);

        stockSite::create([
            'designation' => "FDS",
        ]);

        stockSite::create([
            'designation' => "magasin 3D",
        ]);
    }
}
