<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Category::create([
        'name' => 'Categoria A1',
      //  'description' => '',
        'project_id' => 1
      ]);
      Category::create([
        'name' => 'Categoria A2',
      //  'description' => '',
        'project_id' => 1
      ]);
      Category::create([
        'name' => 'Categoria B1',
      //  'description' => '',
        'project_id' => 2
      ]);
      Category::create([
        'name' => 'Categoria B2',
      //  'description' => '',
        'project_id' => 2
      ]);
    }
}
