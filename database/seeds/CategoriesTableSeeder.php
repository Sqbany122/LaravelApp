<?php

use Illuminate\Database\Seeder;
use App\Categories;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categories::truncate();

        Categories::create(['category_name' => 'Laptopy i komputery']);
        Categories::create(['category_name' => 'Podzespoły komputerowe']);
        Categories::create(['category_name' => 'Smartfony']);
        Categories::create(['category_name' => 'Gaming']);
        Categories::create(['category_name' => 'AGD']);
        Categories::create(['category_name' => 'Akcesoria']);
        Categories::create(['category_name' => 'Konsole i gry']);
        Categories::create(['category_name' => 'Fotografia i wideo']);
        Categories::create(['category_name' => 'TV i audio']);
    }
}
