<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['title' => 'Главная', 'url' => '#', 'order' => 1, 'is_active' => true],
            ['title' => 'Каталог', 'url' => '#', 'order' => 2, 'is_active' => true],
            ['title' => 'Бренды', 'url' => '#', 'order' => 3, 'is_active' => true],
            ['title' => 'Доставка и оплата', 'url' => '#', 'order' => 4, 'is_active' => true],
            ['title' => 'Помощь', 'url' => '#', 'order' => 5, 'is_active' => true],
            ['title' => 'Компания', 'url' => '#', 'order' => 6, 'is_active' => true],
        ];

        foreach ($items as $item) {
            MenuItem::create($item);
        }
    }
}



