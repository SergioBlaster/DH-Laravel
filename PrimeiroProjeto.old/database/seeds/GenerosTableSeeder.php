<?php

use Illuminate\Database\Seeder;
use App\Genero;

class GenerosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genero::updateOrCreate([
            'descricao' => 'Romance'
        ]);

        Genero::updateOrCreate([
            'descricao' => 'Drama'
        ]);

        Genero::updateOrCreate([
            'descricao' => 'Ação'
        ]);

        Genero::updateOrCreate([
            'descricao' => 'Ficção'
        ]);

        Genero::updateOrCreate([
            'descricao' => 'Terror'
        ]);

        Genero::updateOrCreate([
            'descricao' => 'Suspense'
        ]);
    }
}
