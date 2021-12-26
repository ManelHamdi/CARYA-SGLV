<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin Admin',
            'email' => 'admin@material.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('entreprises')->insert([
            'adresse' => '8612 N°5 Chargueia 1',
            'ville' => 'Tunis',
            'telephone' => '71717171',
            'logo' => file_get_contents('public/images/logos.png'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('admins')->insert([
            'nom' => 'nAdmin',
            'prenom' => 'pAdmin',
            'tel' => '25558963',
            'email' => 'madmin@sglv.com',
            'email_verified_at' => now(),
            'password' => Hash::make('madmin'),
            'entreprise_id' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('employes')->insert([
            'nom' => 'nEmploye',
            'prenom' => 'pEmploye',
            'tel' => '25558963',
            'email' => 'memploye@sglv.com',
            'email_verified_at' => now(),
            'password' => Hash::make('memploye'),
            'entreprise_id' => '1',
            'statut' => 'active',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
