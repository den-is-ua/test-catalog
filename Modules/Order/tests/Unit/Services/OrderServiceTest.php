<?php

declare(strict_types=1);

namespace Modules\Order\Tests\Unit\Services;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Common\DTO\OrderProductDTO;
use Modules\Order\Models\Order;
use Modules\Order\Services\OrderService;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class OrderServiceTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function save_order_persists_order_and_items_with_total_sum_of_prices(): void
    {
        // Given a list of products (DTOs)
        $products = collect([
            new OrderProductDTO(1, 'Prod A', 100, 2),
            new OrderProductDTO(2, 'Prod B', 250, 1),
        ]);

        // When saving an order
        OrderService::saveOrder(
            username: 'john_doe',
            address: '123 Main St',
            phone: '+123456789',
            notes: 'Leave at door',
            products: $products,
        );

        // Then a single order is created with correct fields
        $this->assertDatabaseCount('orders', 1);
        $order = Order::query()->firstOrFail();

        $this->assertSame('john_doe', $order->username);
        $this->assertSame('+123456789', $order->phone);
        $this->assertSame('123 Main St', $order->address);
        $this->assertSame('Leave at door', $order->notes);

        // total_amount is the sum of "price" fields (not price * qty)
        $this->assertSame(350, $order->total_amount); // 100 + 250

        // And related items are created with mapped fields
        $this->assertDatabaseCount('order_items', 2);

        $items = $order->items()->orderBy('product_id')->get();
        $this->assertSame([1, 2], $items->pluck('product_id')->all());
        $this->assertSame(['Prod A', 'Prod B'], $items->pluck('name')->all());
        $this->assertSame([100, 250], $items->pluck('price')->all());
        $this->assertSame([2, 1], $items->pluck('qty')->all());
    }
}
