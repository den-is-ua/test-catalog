<?php

declare(strict_types=1);

namespace Modules\Common\DTO;

use Modules\Common\Contracts\DTO\OrderProductDTOContract;

class OrderProductDTO implements OrderProductDTOContract
{
    public function __construct(
        public int $id,
        public string $name,
        public int $price,
        public int $qty
    ) {}

    public function getId(): int
    {
        return $this->id;
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
