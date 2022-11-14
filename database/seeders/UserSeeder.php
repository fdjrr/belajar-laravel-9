<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $users = [
      [
        'name' => 'Fadjrir Herlambang',
        'username' => 'fadjrir',
        'email' => 'fadjrir.co.id@gmail.com',
        'password' => bcrypt('kretechid0'),
      ],
      [
        'name' => 'Ananda Maharani',
        'username' => 'ranigendut',
        'email' => 'ananda.maharani@gmail.com',
        'password' => bcrypt('@ranigendut'),
      ],
    ];

    foreach ($users as $key => $value) {
      User::create($value);
    }
  }
}
