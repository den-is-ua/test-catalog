<?php

declare(strict_types=1);

namespace Modules\Common\Contracts\Services;

use Modules\Common\Contracts\DTO\ProductDTOContract;
use \Illuminate\Support\Collection;

interface ProductServiceContract
{
    /**
     * @return ProductDTOContract[]|Collection
     */
    public function getAllProducts(): iterable;
}
