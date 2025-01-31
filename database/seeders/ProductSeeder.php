<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => "наушники", 'price' => 100],
            ['name' => "чехол для телефона", 'price' => 20],
            ['name' => "клавиатура", 'price' => 150],
        ];

        foreach ($data as $item) {
            Product::create($item);
        }
    }
}
