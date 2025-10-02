<?php

namespace Modules\Order\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Order\Models\OrderItem;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\Order\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    protected $model = OrderItem::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->numberBetween(1, 100),
            'qty' => $this->faker->numberBetween(1, 10),
        ];
    }
}
