<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProjetoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Projeto::factory(40)->create();
    }
}
