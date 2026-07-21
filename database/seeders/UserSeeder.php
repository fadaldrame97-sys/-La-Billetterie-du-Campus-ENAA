<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('password'),
            'role'=>'admin'

        ]);



         $etudiants = [

        ['name' => 'Fadal Dramé', 'email' => 'fadal@gmail.com'],
         ['name' => 'Mouhamad Ba', 'email' => 'ba@gmail.com'],
        ['name' => 'Babacar Faye', 'email' => 'babacar@gmail.com'],
        ['name' => 'Boubacar Ba', 'email' => 'boubacar@gmail.com'],
        ['name' => 'Fatou Ba', 'email' => 'fatou@gmail.com'],
        ['name' => 'Khalifa Sylla', 'email' => 'sylla@gmail.com'],
        ['name' => 'Fatima Diallo', 'email' => 'diallo@gmail.com'],
        ['name' => 'Coumba Sy', 'email' => 'sy@gmail.com'],
        ['name' => 'Moustapha Samb', 'email' => 'moustapha@gmail.com'],
        ['name' => 'Aminata Fall', 'email' => 'fall@gmail.com'],
        ['name' => 'Ibrahima Diop', 'email' => 'diop@gmail.com'],
        ['name' => 'Mariama Diakhaté', 'email' => 'diakhate@gmail.com'],
        ['name' => 'Sokhna Bousso Faye', 'email' => 'faye@gmail.com'],
        ['name' => 'Abdou Ahad Bousso', 'email' => 'bousso@gmail.com'],
        ['name' => 'Abdoulahi niang', 'email' => 'niang@gmail.com'],
        ['name' => 'Oumoul Khairy', 'email' => 'oummou@gmail.com'],

    ];

    foreach ($etudiants as $etudiant) {

        User::create([
            'name' => $etudiant['name'],
            'email' => $etudiant['email'],
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);
    }
    }
}
