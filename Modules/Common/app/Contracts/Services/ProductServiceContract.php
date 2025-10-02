<?php

declare(strict_types=1);

namespace Modules\Common\Contracts\Services;

use Modules\Common\Contracts\DTO\ProductDTOContract;

interface ProductServiceContract {

    /**
     *  
     * @return ProductDTOContract[]
     */
    public function getAllProducts(): array;
}
