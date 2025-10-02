<?php

declare(strict_types=1);

namespace Modules\Common\Contracts\DTO;

interface OrderProductDTOContract
{
    public function getProductId(): int;

    public function getName(): string;

    public function getPrice(): int;

    public function getQty(): int;
}
