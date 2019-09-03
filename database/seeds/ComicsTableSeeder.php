<?php

use Illuminate\Database\Seeder;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
       DB::table('comics')->insert([
         'serie_id' => 1,   //serie_id parte da 1
         'name' => "Hero for a day",
         'barcode' => "3RC402A00",
         'price' => 3.70,
         'exit_number' => "003",
         'exit_date'=> "2018/04/23",
         'publisher'=> "Panini",
         'editorial_series' => "Marvel Universe",
         'rare_id'=> 1,
         'quantity'=> 0,
         'media' => "https://www.google.com/url?sa=i&source=images&cd=&ved=2ahUKEwiDt5_M2NXjAhUF1hoKHRVfC6YQjRx6BAgBEAU&url=https%3A%2F%2Fmikimoz.blogspot.com%2F2018%2F11%2Famazing-spiderman-ritorno-alle-origini-recensione.html&psig=AOvVaw0kREuTGuujjByh3lJQkC0e&ust=1564337268780045"
       ]);

       DB::table('comics')->insert([
         'serie_id' => 1,
         'name' => "Go home",
         'barcode' => "7RD452A50",
         'price' => 3.70,
         'exit_number' => "010",
         'exit_date'=> '2018/04/23',
         'publisher'=> "Panini",
         'editorial_series' => "Marvel",
         'rare_id'=> 2,
         'quantity'=> 10,
         'media' => "https://www.google.com/url?sa=i&source=images&cd=&ved=2ahUKEwiixPmS2dXjAhUJa1AKHb_WD3EQjRx6BAgBEAU&url=https%3A%2F%2Fwww.fumetto-online.it%2Fit%2Fmarvel-italia-spider-man-271-uomo-ragno-271-capitolo-finale-di-2-c11665002710.php&psig=AOvVaw0kREuTGuujjByh3lJQkC0e&ust=1564337268780045"
       ]);

      DB::table('comics')->insert([
        'serie_id' => 1,
        'name' => "Fanatics",
        'barcode' => "1RC502A60",
        'price' => 3.70,
        'exit_number' => "038",
        'exit_date'=> '2018/04/23',
        'publisher'=> "Panini",
        'editorial_series' => "Marvel",
        'quantity'=> 3,
        'media' => "https://www.google.com/url?sa=i&source=images&cd=&ved=2ahUKEwj8vcCb2dXjAhUFYVAKHZsMC3gQjRx6BAgBEAU&url=https%3A%2F%2Fwww.fumetto-online.it%2Fit%2Fmarvel-italia-spider-man-196-uomo-ragno-196-il-ragno-rosso-1-c11665001960.php&psig=AOvVaw0kREuTGuujjByh3lJQkC0e&ust=1564337268780045"
      ]);
      DB::table('comics')->insert([
        'serie_id' => 2,
        'name' => "Game Love",
        'barcode' => "9LC203B00",
        'price' => 3.70,
        'exit_number' => "003",
        'exit_date'=> "2018/04/23",
        'publisher'=> "Panini",
        'editorial_series' => "Angelology Corp",
        'rare_id'=> 3,
        'quantity'=> 5,
        'media' => "https://www.google.com/url?sa=i&source=images&cd=&ved=2ahUKEwiDt5_M2NXjAhUF1hoKHRVfC6YQjRx6BAgBEAU&url=https%3A%2F%2Fmikimoz.blogspot.com%2F2018%2F11%2Famazing-spiderman-ritorno-alle-origini-recensione.html&psig=AOvVaw0kREuTGuujjByh3lJQkC0e&ust=1564337268780045"
      ]);

      DB::table('comics')->insert([
        'serie_id' => 3,
        'name' => "Shugo Chara Hearts",
        'barcode' => "3JC202C10",
        'price' => 4.70,
        'exit_number' => "019",
        'exit_date'=> '2018/03/23',
        'publisher'=> "Giunko",
        'editorial_series' => "Kim Huahyu",
        'rare_id'=> 4,
        'quantity'=> 7,
        'media' => "https://www.google.com/url?sa=i&source=images&cd=&ved=2ahUKEwiixPmS2dXjAhUJa1AKHb_WD3EQjRx6BAgBEAU&url=https%3A%2F%2Fwww.fumetto-online.it%2Fit%2Fmarvel-italia-spider-man-271-uomo-ragno-271-capitolo-finale-di-2-c11665002710.php&psig=AOvVaw0kREuTGuujjByh3lJQkC0e&ust=1564337268780045"
      ]);

     DB::table('comics')->insert([
       'serie_id' => 4,
       'name' => "Ritorno a Gardenia",
       'barcode' => "3LW407A09",
       'price' => 3.20,
       'exit_number' => "188",
       'exit_date'=> '2018/04/23',
       'publisher'=> "Panini",
       'editorial_series' => "Rainbow",
       'rare_id'=> 5,
       'quantity'=> 3,
       'media' => "https://www.google.com/url?sa=i&source=images&cd=&ved=2ahUKEwj8vcCb2dXjAhUFYVAKHZsMC3gQjRx6BAgBEAU&url=https%3A%2F%2Fwww.fumetto-online.it%2Fit%2Fmarvel-italia-spider-man-196-uomo-ragno-196-il-ragno-rosso-1-c11665001960.php&psig=AOvVaw0kREuTGuujjByh3lJQkC0e&ust=1564337268780045"
     ]);
    }
}
