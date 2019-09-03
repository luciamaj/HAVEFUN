<?php

use Illuminate\Database\Seeder;

class SeriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('series')->insert([
        'name' => "Spiderman",
        'category_id' => 1
        ]);
      DB::table('series')->insert([
        'name' => "Angel's Friends",
        'category_id' => 3
        ]);
      DB::table('series')->insert([
        'name' => "Shugo Chara",
        'category_id' => 4
        ]);
      DB::table('series')->insert([
        'name' => "Winx",
        'category_id' => 3
        ]);
    }
}
