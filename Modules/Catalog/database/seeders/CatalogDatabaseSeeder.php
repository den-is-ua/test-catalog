<?php

namespace Modules\Catalog\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Catalog\Models\Category;
use Modules\Catalog\Models\Product;

class CatalogDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            // CategorySeeder::class,
            // ProductSeeder::class,
        ]);

        Category::factory()
            ->count(10)
            ->has(
                Product::factory()
                ->count(rand(10, 100))
            )
            ->create();
    }
}
