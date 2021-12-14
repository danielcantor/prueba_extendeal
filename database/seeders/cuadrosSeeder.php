<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CuadrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Cuadro::factory(10)->create();
    }
}
