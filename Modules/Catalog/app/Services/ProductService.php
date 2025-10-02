<?php

declare(strict_types=1);

namespace Modules\Catalog\Services;

use Modules\Catalog\Models\Product;
use Modules\Common\Contracts\DTO\ProductDTOContract;
use Modules\Common\Contracts\Services\ProductServiceContract;
use \Illuminate\Support\Collection;

class ProductService implements ProductServiceContract
{
    /**
     * @return ProductDTOContract[]|Collection
     */
    public function getAllProducts(): iterable
    {
        return Product::all();
    }
}
