<?php

declare(strict_types=1);

namespace Modules\OrderProductConverter\Services;

use Modules\Common\Contracts\DTO\ProductDTOContract;
use Modules\Common\Contracts\Services\OrderProductConverterContract;
use Modules\Common\Contracts\Services\ProductServiceContract;
use Modules\Common\DTO\OrderProductDTO;

class OrderProductConverterService implements OrderProductConverterContract
{
    public function __construct(private ProductServiceContract $productService) {}

    /**
     * @return OrderProductDTO[]
     */
    public function getAllProducts(): array
    {
        $productsToConvert = $this->productService->getAllProducts();

        $products = array_map(function (ProductDTOContract $item) {
            return new OrderProductDTO(
                $item->getId(),
                $item->getName(),
                $item->getPrice(),
                $item->getQty()
            );
        }, $productsToConvert);

        return $products;
    }
}
