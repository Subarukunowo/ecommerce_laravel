<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Skripsi;
use App\Models\Distributor;
use App\Models\FlashSale;
use App\Models\Product; // Jangan lupa import model Product
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'User2',
            'email' => 'user2@gmail.com',
            'password' => bcrypt('123456789'),
            'point' => 10000,
        ]);

        Distributor::create([
            'nama_distributor' => 'Distributor A',
            'kota' => 'Bengkalis',
            'provinsi' => 'Riau',
            'kontak' => '081234567890',
            'email' => 'distributorA@example.com',
        ]);

        Distributor::create([
            'nama_distributor' => 'Distributor B',
            'kota' => 'Pekanbaru',
            'provinsi' => 'Riau',
            'kontak' => '081234567891',
            'email' => 'distributorB@example.com',
        ]);

       
    

       

        /*
        Admin::create([
            'name' => 'Admin',
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456789'),
        ]);

        Skripsi::create([
            'judul' => 'Analisis pengaruh Chatgpt',
            'nama' => 'Dimas Rio Ardianto',
            'nim' => '6304',
            'angkatan' => '2022',
            'dosen_pembimbing1' => 'Fajri Profesio Putra, M.Cs',
            'dosen_pembimbing2' => 'Elvi Rahmi, M.Kom',
        ]);
        */
    }
}
