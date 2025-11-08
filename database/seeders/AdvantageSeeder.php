<?php

namespace Database\Seeders;

use App\Models\Advantage;
use Illuminate\Database\Seeder;

class AdvantageSeeder extends Seeder
{
    public function run(): void
    {
        $advantages = [
            [
                'title' => 'Аппаратные кошельки',
                'description' => null,
                'icon' => '/assets/block.svg',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'U2F-токены',
                'description' => null,
                'icon' => '/assets/block.svg',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Устройства для записи seed',
                'description' => 'Надежные устройства для хранения мнемонической фразы, необходимой для восстановления доступа к вашим средствам',
                'icon' => '/assets/block.svg',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Устройства для записи seed',
                'description' => 'Надежные устройства для хранения мнемонической фразы, необходимой для восстановления доступа к вашим средствам',
                'icon' => '/assets/block.svg',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Аксессуары',
                'description' => null,
                'icon' => '/assets/block.svg',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Чехлы и кейсы',
                'description' => null,
                'icon' => '/assets/block.svg',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($advantages as $advantage) {
            Advantage::create($advantage);
        }
    }
}


