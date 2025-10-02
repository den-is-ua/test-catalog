<?php

declare(strict_types=1);

namespace Modules\Common\DTO;

use Modules\Common\Contracts\DTO\OrderProductDTOContract;

class OrderProductDTO implements OrderProductDTOContract
{
    public function __construct(
        public int $productId,
        public string $name,
        public int $price,
        public int $qty
    ) {}

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {

        return $this->price;
    }

    public function getQty(): int
    {
        return $this->qty;
    }
}
