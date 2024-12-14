<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    User::create([
      'full_name' => 'Aaron Jauregui Sifuentes',
      'email' => 'aaronjau21@gmail.com',
      'password' => bcrypt('123456789'),
      'role' => 'admin',
      'confirm_count' => true,
      'status' => true
    ]);
  }
}
