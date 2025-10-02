<?php

declare(strict_types=1);

namespace Modules\Common\Contracts\Services;

use Illuminate\Support\Collection;
use Modules\Common\Contracts\DTO\ProductDTOContract;

interface ProductServiceContract
{
    /**
     * @return ProductDTOContract[]|Collection
     */
    public function getAllProducts(): iterable;
}
