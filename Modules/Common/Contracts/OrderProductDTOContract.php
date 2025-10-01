<?php

declare(strict_types=1);

namespace Modules\Common\Contracts;



interface OrderProductDTOContract 
{
    public function getId(): int;
    public function getName(): string;
    public function getPrice(): int;
    public function getQty(): int;
}
