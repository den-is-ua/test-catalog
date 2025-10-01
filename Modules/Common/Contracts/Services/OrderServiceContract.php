<?php

declare(strict_types=1);

namespace Modules\Common\Contracts\Services;


interface OrderServiceContract
{
    public function store(OrderDTOContract $order);
    public function update(int $orderId, OrderDTOContract $order);
    public function show(int $orderId);

    public function get(int $orderId);
}
