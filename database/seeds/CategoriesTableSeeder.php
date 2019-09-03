<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->insert([
        'category' => "Fumetto Americano",
        ]);
      DB::table('categories')->insert([
        'category' => "Fumetto Inglese",
        ]);
      DB::table('categories')->insert([
        'category' => "Fumetto Italiano",
        ]);
      DB::table('categories')->insert([
        'category' => "Manga",
        ]);
    }
}
