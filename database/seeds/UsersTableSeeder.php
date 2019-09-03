<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'name' => "Valeria Spanò",
        'username' => "Vale98",
        'isAdmin' => "0",
        'email' => "valeria.spano@ied.edu",
        'password' => bcrypt('ciaociao'),
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

      DB::table('users')->insert([
        'name' => "Laura Epifani",
        'username' => "Laura96",
        'isAdmin' => "1",
        'email' => "laura.epifani@ied.edu",
        'password' => bcrypt('ciaociao'),
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

      DB::table('users')->insert([
        'name' => "Francesco Porta",
        'username' => "Fra99",
        'isAdmin' => "1",
        'email' => "francesco.porta@ied.edu",
        'password' => bcrypt('ciaociao'),
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

      DB::table('users')->insert([
        'name' => "Creatore Geniale",
        'username' => "GenioDelMale",
        'isAdmin' => "2",
        'email' => "super.admin@ied.edu",
        'password' => bcrypt('ciaociao'),
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);
    }
}
