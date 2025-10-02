<?php

namespace Modules\Order\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Order\Models\Order;
use Modules\Order\Models\OrderItem;

class OrderDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::factory(100)
            ->has(
                OrderItem::factory()->count(random_int(1, 10)),
                'items'
            )
            ->create();
    }
}
