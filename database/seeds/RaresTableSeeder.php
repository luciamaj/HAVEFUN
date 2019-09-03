<?php

use Illuminate\Database\Seeder;

class RaresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('rares')->insert([
        'circulation' => 1,
        'condition' => 2,
        ]);
      DB::table('rares')->insert([
        'circulation' => 2,
        'condition' => 2,
        ]);
      DB::table('rares')->insert([
        'circulation' => 3,
        'condition' => 2,
        ]);
      DB::table('rares')->insert([
        'circulation' => 4,
        'condition' => 1,
        ]);
      DB::table('rares')->insert([
        'circulation' => 5,
        'condition' => 1,
        ]);
    }
}
