<?php

use Illuminate\Database\Seeder;

class ActionFiguresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('action_figures')->insert([
        'name' => "Peter Parker",
        'serie_id' => 1,
        // 'brand' => "Giochi Preziosi",
        'price' => 2.30,
        'height' => 120,
        'material'=> "Plastica",
        'year_of_production'=> 2019,
        // 'made_in' => "Cina",
        // 'new_or_used'=> "Nuovo",
        'media' => "https://www.google.com/url?sa=i&source=images&cd=&ved=2ahUKEwiDt5_M2NXjAhUF1hoKHRVfC6YQjRx6BAgBEAU&url=https%3A%2F%2Fmikimoz.blogspot.com%2F2018%2F11%2Famazing-spiderman-ritorno-alle-origini-recensione.html&psig=AOvVaw0kREuTGuujjByh3lJQkC0e&ust=1564337268780045",
        'quantity' => 2
      ]);

      DB::table('action_figures')->insert([
        'name' => "Gwen Stefany",
        'serie_id' => 1,
        // 'brand' => "Chicco",
        'price' => 2.30,
        'height' => 80,
        'material'=> "Legno",
        'year_of_production'=> 2007,
        // 'made_in' => "India",
        // 'new_or_used'=> "Usato",
        'media' => "https://www.google.com/url?sa=i&source=images&cd=&ved=2ahUKEwiixPmS2dXjAhUJa1AKHb_WD3EQjRx6BAgBEAU&url=https%3A%2F%2Fwww.fumetto-online.it%2Fit%2Fmarvel-italia-spider-man-271-uomo-ragno-271-capitolo-finale-di-2-c11665002710.php&psig=AOvVaw0kREuTGuujjByh3lJQkC0e&ust=1564337268780045",
        'quantity' => 11
      ]);

      DB::table('action_figures')->insert([
        'name' => "Octavius",
        'serie_id' => 1,
        // 'brand' => "Giochi Preziosi",
        'price' => 2.30,
        'height' => 200,
        'material'=> "Metallo",
        'year_of_production'=> "2017",
        // 'made_in' => "Finlandia",
        // 'new_or_used'=> "Nuovo",
        'media' => "https://www.google.com/url?sa=i&source=images&cd=&ved=2ahUKEwj8vcCb2dXjAhUFYVAKHZsMC3gQjRx6BAgBEAU&url=https%3A%2F%2Fwww.fumetto-online.it%2Fit%2Fmarvel-italia-spider-man-196-uomo-ragno-196-il-ragno-rosso-1-c11665001960.php&psig=AOvVaw0kREuTGuujjByh3lJQkC0e&ust=1564337268780045",
        'quantity' => 6
      ]);
      DB::table('action_figures')->insert([
        'name' => "Peter Parker",
        'serie_id' => 1,
        // 'brand' => "Giochi Preziosi",
        'price' => 2.30,
        'height' => 120,
        'material'=> "Plastica",
        'year_of_production'=> 2019,
        // 'made_in' => "Cina",
        // 'new_or_used'=> "Nuovo",
        'media' => "https://www.google.com/url?sa=i&source=images&cd=&ved=2ahUKEwiDt5_M2NXjAhUF1hoKHRVfC6YQjRx6BAgBEAU&url=https%3A%2F%2Fmikimoz.blogspot.com%2F2018%2F11%2Famazing-spiderman-ritorno-alle-origini-recensione.html&psig=AOvVaw0kREuTGuujjByh3lJQkC0e&ust=1564337268780045",
        'quantity' => 2
      ]);

      DB::table('action_figures')->insert([
        'name' => "Gwen Stefany",
        'serie_id' => 1,
        // 'brand' => "Chicco",
        'price' => 2.30,
        'height' => 80,
        'material'=> "Legno",
        'year_of_production'=> 2007,
        // 'made_in' => "India",
        // 'new_or_used'=> "Usato",
        'media' => "https://www.google.com/url?sa=i&source=images&cd=&ved=2ahUKEwiixPmS2dXjAhUJa1AKHb_WD3EQjRx6BAgBEAU&url=https%3A%2F%2Fwww.fumetto-online.it%2Fit%2Fmarvel-italia-spider-man-271-uomo-ragno-271-capitolo-finale-di-2-c11665002710.php&psig=AOvVaw0kREuTGuujjByh3lJQkC0e&ust=1564337268780045",
        'quantity' => 11
      ]);

      DB::table('action_figures')->insert([
        'name' => "Octavius",
        'serie_id' => 1,
        // 'brand' => "Giochi Preziosi",
        'price' => 2.30,
        'height' => 200,
        'material'=> "Metallo",
        'year_of_production'=> "2017",
        // 'made_in' => "Finlandia",
        // 'new_or_used'=> "Nuovo",
        'media' => "https://www.google.com/url?sa=i&source=images&cd=&ved=2ahUKEwj8vcCb2dXjAhUFYVAKHZsMC3gQjRx6BAgBEAU&url=https%3A%2F%2Fwww.fumetto-online.it%2Fit%2Fmarvel-italia-spider-man-196-uomo-ragno-196-il-ragno-rosso-1-c11665001960.php&psig=AOvVaw0kREuTGuujjByh3lJQkC0e&ust=1564337268780045",
        'quantity' => 6
      ]);
    }
}
