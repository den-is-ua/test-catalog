<?php

namespace Modules\Catalog\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Catalog\Models\Product;
use Modules\Catalog\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\Catalog\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            // Associate a category using the Category factory by default.
            'category_id' => Category::factory(),
            'name' => $this->faker->unique()->words(3, true),
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'description' => $this->faker->optional()->paragraph(),
            'qty' => $this->faker->numberBetween(0, 100),
        ];
    }
}
