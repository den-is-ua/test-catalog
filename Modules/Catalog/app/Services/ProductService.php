<?php

declare(strict_types=1);

namespace Modules\Catalog\Services;

use Illuminate\Support\Collection;
use Modules\Catalog\Models\Product;
use Modules\Common\Contracts\DTO\ProductDTOContract;
use Modules\Common\Contracts\Services\ProductServiceContract;

class ProductService implements ProductServiceContract
{
    /**
     * @return ProductDTOContract[]|Collection
     */
    public function getAllProducts(): iterable
    {
        return Product::all();
    }

    public function getProductsByIds(array $productIds): iterable
    {
        return Product::findMany($productIds);
    }
}
