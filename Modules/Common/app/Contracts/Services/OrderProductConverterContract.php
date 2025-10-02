<?php

declare(strict_types=1);

namespace Modules\Common\Contracts\Services;

use \Modules\Common\Contracts\DTO\OrderProductDTOContract;


interface OrderProductConverterContract 
{
    /**
     * 
     * @return OrderProductDTOContract[]
     */
    public function getAllProducts(): array;
}
