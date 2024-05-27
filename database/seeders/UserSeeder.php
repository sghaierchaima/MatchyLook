<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::create([
            'prenom' => 'Nadia',
            'nom' => 'ksiksi',
            'adressemail' => 'nadia@example.com',
            'sexe' => 'femme',
            'mtp' => Hash::make('12345'),
        ]);
    }
}
