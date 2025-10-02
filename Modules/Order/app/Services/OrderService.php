<?php

declare(strict_types=1);

namespace Modules\Order\Services;

use Modules\Common\Contracts\DTO\OrderProductDTOContract;
use Modules\Order\Models\Order;
use \Modules\Common\Contracts\DTO\ProductDTOContract;



class OrderService  
{
    /**
     * @param OrderProductDTOContract[] $products
     */
    public static function saveOrder(string $username, string $address, $phone, $notes, iterable $products): bool
    {
        $order = Order::create([
            'username' => $username,
            'phone' => $phone,
            'address' => $address,
            'notes' => $notes,
        ]);

        $productsToSave = array_map(function (OrderProductDTOContract $item) {
            return [
                'product_id' => $item->getProductId(),
                'name' => $item->getName(),
                'price' => $item->getPrice(),
                'qty' => $item->getQty()
            ];
        },$products);

        return $order->orderItems()->createMany($productsToSave);
    }
}
