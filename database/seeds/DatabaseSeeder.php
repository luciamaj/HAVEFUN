<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call(RaresTableSeeder::class);
      $this->call(CategoriesTableSeeder::class);
      $this->call(SeriesTableSeeder::class);
      $this->call(ComicsTableSeeder::class);
      $this->call(ActionFiguresTableSeeder::class);
      $this->call(UsersTableSeeder::class);
        // $this->call(EmployeesTableSeeder::class);
        // $this->call(SuperAdminsTableSeeder::class);
    }
}
