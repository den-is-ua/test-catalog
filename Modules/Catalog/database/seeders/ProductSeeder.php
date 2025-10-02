<?php

namespace Modules\Catalog\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Catalog\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()->count(500)->create();
    }
}
