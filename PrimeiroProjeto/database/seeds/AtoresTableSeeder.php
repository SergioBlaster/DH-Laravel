<?php

use Illuminate\Database\Seeder;
use App\Ator;

class AtoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ator::updateOrCreate([
            'nome' => 'Tom Cruise'
        ]);

        Ator::updateOrCreate([
            'nome' => 'Nicole Kidman'
        ]);
    }
}
