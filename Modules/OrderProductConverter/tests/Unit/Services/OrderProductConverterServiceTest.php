<?php

declare(strict_types=1);

namespace Modules\OrderProductConverter\Tests\Unit\Services;

use Mockery;
use Modules\Common\Contracts\DTO\ProductDTOContract;
use Modules\Common\Contracts\Services\ProductServiceContract;
use Modules\Common\DTO\OrderProductDTO;
use Modules\OrderProductConverter\Services\OrderProductConverterService;
use Tests\TestCase;

class OrderProductConverterServiceTest extends TestCase
{
    public function testGetAllProducts(): void
    {
        $productService = Mockery::mock(ProductServiceContract::class);

        $productDTO = Mockery::mock(ProductDTOContract::class);
        $productDTO->shouldReceive('getId')->andReturn(1);
        $productDTO->shouldReceive('getName')->andReturn('Test Product');
        $productDTO->shouldReceive('getPrice')->andReturn(100.0);
        $productDTO->shouldReceive('getQty')->andReturn(10);

        $productService->shouldReceive('getAllProducts')->andReturn([$productDTO]);

        $orderProductConverterService = new OrderProductConverterService($productService);

        $result = $orderProductConverterService->getAllProducts();

        $this->assertIsArray($result);
        $this->assertCount(1, $result);
        $this->assertInstanceOf(OrderProductDTO::class, $result[0]);
        $this->assertEquals(1, $result[0]->getId());
        $this->assertEquals('Test Product', $result[0]->getName());
        $this->assertEquals(100.0, $result[0]->getPrice());
        $this->assertEquals(10, $result[0]->getQty());
    }
}
