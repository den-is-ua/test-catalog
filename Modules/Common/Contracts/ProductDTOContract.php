<?php

declare(strict_types=1);

namespace Models\Common\Contracts;



interface ProductDTOContract
{
    public function getId(): int;
    public function getName(): string;
    public function getDescription(): string;
    public function getPrice(): int;
    public function getQty(): int;
}
