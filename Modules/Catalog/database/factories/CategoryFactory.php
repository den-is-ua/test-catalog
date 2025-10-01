<?php

namespace Modules\Catalog\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Catalog\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\Catalog\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Category>
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            // parent_id is nullable by default; override when needed.
            'parent_id' => null,
            'name' => $this->faker->unique()->words(2, true),
        ];
    }
}
