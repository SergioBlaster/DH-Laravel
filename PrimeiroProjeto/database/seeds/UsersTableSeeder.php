<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([
            'name' => 'Abirosvaldo',
            'email' => 'abirosvaldo@gmail.com',
            'password' => bcrypt('123456')
        ]);

        User::updateOrCreate([
            'name' => 'Teste',
            'email' => 'teste@gmail.com',
            'password' => bcrypt('123456')
        ]);
    }
}
