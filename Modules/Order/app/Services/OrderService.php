<?php

declare(strict_types=1);

namespace Modules\Order\Services;

use Illuminate\Support\Collection;
use Modules\Common\Contracts\DTO\OrderProductDTOContract;
use Modules\Order\Models\Order;

class OrderService
{
    /**
     * @param  OrderProductDTOContract[]|Collection  $products
     */
    public static function saveOrder(string $username, string $address, $phone, $notes, Collection $products): void
    {
        $order = Order::create([
            'username' => $username,
            'phone' => $phone,
            'address' => $address,
            'notes' => $notes,
        ]);

        $productsToSave = $products->map(function (OrderProductDTOContract $item) {
            return [
                'product_id' => $item->getProductId(),
                'name' => $item->getName(),
                'price' => $item->getPrice(),
                'qty' => $item->getQty(),
            ];
        });

        $order->items()->createMany($productsToSave);
    }
}
