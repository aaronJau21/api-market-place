<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::create([
            'full_name' => 'Maria Claudia',
            'email' => 'mariaClaudia@gmail.com',
            'phone' => '98754321',
            'address' => 'Rua Maria Claudia, 123',
            'password' => bcrypt('123456789'),
            'confirm_count' => true,
        ]);
    }
}
