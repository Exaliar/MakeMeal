<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            // Główne kategorie
            ['user_id' => 1, 'name' => 'Mięso', 'name_en' => 'Meat', 'has_child' => true, 'category_id' => null],
            ['user_id' => 1, 'name' => 'Warzywa', 'name_en' => 'Vegetables', 'has_child' => true, 'category_id' => null],
            ['user_id' => 1, 'name' => 'Owoce', 'name_en' => 'Fruits', 'has_child' => true, 'category_id' => null],
            ['user_id' => 1, 'name' => 'Oleje', 'name_en' => 'Oils', 'has_child' => true, 'category_id' => null],
            ['user_id' => 1, 'name' => 'Produkty nabiałowe', 'name_en' => 'Dairy products', 'has_child' => true, 'category_id' => null],
            ['user_id' => 1, 'name' => 'Ryby', 'name_en' => 'Fish', 'has_child' => true, 'category_id' => null],
            ['user_id' => 1, 'name' => 'Przetwory mięsne', 'name_en' => 'Meat products', 'has_child' => true, 'category_id' => null],
            ['user_id' => 1, 'name' => 'Słodycze', 'name_en' => 'Sweets', 'has_child' => true, 'category_id' => null],
            ['user_id' => 1, 'name' => 'Napoje', 'name_en' => 'Beverages', 'has_child' => true, 'category_id' => null],
            ['user_id' => 1, 'name' => 'Produkty zbożowe', 'name_en' => 'Grain products', 'has_child' => true, 'category_id' => null],

            // Kategorie wewnętrzne
            ['user_id' => 1, 'name' => 'Drób', 'name_en' => 'Poultry', 'has_child' => false, 'category_id' => 1], // Przypisane do kategorii "Mięso"
            ['user_id' => 1, 'name' => 'Wieprzowina', 'name_en' => 'Pork', 'has_child' => false, 'category_id' => 1],
            ['user_id' => 1, 'name' => 'Wołowina', 'name_en' => 'Beef', 'has_child' => false, 'category_id' => 1],
            ['user_id' => 1, 'name' => 'Marchewka', 'name_en' => 'Carrots', 'has_child' => false, 'category_id' => 2], // Przypisane do kategorii "Warzywa"
            ['user_id' => 1, 'name' => 'Ziemniaki', 'name_en' => 'Potatoes', 'has_child' => false, 'category_id' => 2],
            ['user_id' => 1, 'name' => 'Pomidory', 'name_en' => 'Tomatoes', 'has_child' => false, 'category_id' => 2],
            ['user_id' => 1, 'name' => 'Jabłka', 'name_en' => 'Apples', 'has_child' => false, 'category_id' => 3], // Przypisane do kategorii "Owoce"
            ['user_id' => 1, 'name' => 'Banany', 'name_en' => 'Bananas', 'has_child' => false, 'category_id' => 3],
            ['user_id' => 1, 'name' => 'Pomarańcze', 'name_en' => 'Oranges', 'has_child' => false, 'category_id' => 3],
            ['user_id' => 1, 'name' => 'Oliwa z oliwek', 'name_en' => 'Olive oil', 'has_child' => false, 'category_id' => 4], // Przypisane do kategorii "Oleje"
            ['user_id' => 1, 'name' => 'Olej roślinny', 'name_en' => 'Vegetable oil', 'has_child' => false, 'category_id' => 4],
            ['user_id' => 1, 'name' => 'Jogurt', 'name_en' => 'Yogurt', 'has_child' => false, 'category_id' => 5], // Przypisane do kategorii "Produkty nabiałowe"
            ['user_id' => 1, 'name' => 'Ser', 'name_en' => 'Cheese', 'has_child' => false, 'category_id' => 5],
            ['user_id' => 1, 'name' => 'Masło', 'name_en' => 'Butter', 'has_child' => false, 'category_id' => 5],
            ['user_id' => 1, 'name' => 'Łosoś', 'name_en' => 'Salmon', 'has_child' => false, 'category_id' => 6], // Przypisane do kategorii "Ryby"
            ['user_id' => 1, 'name' => 'Tuńczyk', 'name_en' => 'Tuna', 'has_child' => false, 'category_id' => 6],
            ['user_id' => 1, 'name' => 'Dorsz', 'name_en' => 'Cod', 'has_child' => false, 'category_id' => 6],
            ['user_id' => 1, 'name' => 'Wędliny', 'name_en' => 'Cold cuts', 'has_child' => false, 'category_id' => 7], // Przypisane do kategorii "Przetwory mięsne"
            ['user_id' => 1, 'name' => 'Kiełbasy', 'name_en' => 'Sausages', 'has_child' => false, 'category_id' => 7],
            ['user_id' => 1, 'name' => 'Szynka', 'name_en' => 'Ham', 'has_child' => false, 'category_id' => 7],
            ['user_id' => 1, 'name' => 'Czekolada', 'name_en' => 'Chocolate', 'has_child' => false, 'category_id' => 8], // Przypisane do kategorii "Słodycze"
            ['user_id' => 1, 'name' => 'Ciastka', 'name_en' => 'Cookies', 'has_child' => false, 'category_id' => 8],
            ['user_id' => 1, 'name' => 'Lody', 'name_en' => 'Ice cream', 'has_child' => false, 'category_id' => 8],
            ['user_id' => 1, 'name' => 'Woda', 'name_en' => 'Water', 'has_child' => false, 'category_id' => 9], // Przypisane do kategorii "Napoje"
            ['user_id' => 1, 'name' => 'Soki', 'name_en' => 'Juices', 'has_child' => false, 'category_id' => 9],
            ['user_id' => 1, 'name' => 'Herbata', 'name_en' => 'Tea', 'has_child' => false, 'category_id' => 9],
            ['user_id' => 1, 'name' => 'Kawa', 'name_en' => 'Coffee', 'has_child' => false, 'category_id' => 9],
            ['user_id' => 1, 'name' => 'Płatki śniadaniowe', 'name_en' => 'Cereals', 'has_child' => false, 'category_id' => 10], // Przypisane do kategorii "Produkty zbożowe"
            ['user_id' => 1, 'name' => 'Kasza', 'name_en' => 'Grains', 'has_child' => false, 'category_id' => 10],
            ['user_id' => 1, 'name' => 'Mąka', 'name_en' => 'Flour', 'has_child' => false, 'category_id' => 10],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
