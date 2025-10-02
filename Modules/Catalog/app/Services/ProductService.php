<?php

declare(strict_types=1);

namespace Modules\Catalog\Services;

use Modules\Catalog\Models\Product;
use Modules\Common\Contracts\Services\ProductServiceContract;
use \Models\Common\Contracts\DTO\ProductDTOContract;



class ProductService implements ProductServiceContract
{
    /**
     * @return ProductDTOContract[]
     */
    public function getAllProducts(): array
    {
        return Product::all()->toArray();
    }
}
