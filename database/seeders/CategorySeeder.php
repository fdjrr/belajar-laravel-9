<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $categories = [
      [
        'name' => 'Web Development',
        'slug' => 'web-development'
      ],
      [
        'name' => 'Personal',
        'slug' => 'personal'
      ],
    ];

    foreach ($categories as $key => $value) {
      Category::create($value);
    }
  }
}
