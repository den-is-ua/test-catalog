<?php

declare(strict_types=1);

namespace Modules\Common\Contracts;



interface OrderDTOContract 
{
    public function getId(): int;
    public function getUserName(): string;
    public function getUserPhone(): string;
    public function getUserAddress(): string;

    /** @return OrderProductDTOContract[]; **/
    public function getProducts(): array;
}
