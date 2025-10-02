<?php

declare(strict_types=1);

namespace Modules\OrderProductConverter\Tests\Unit\Services;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Catalog\Models\Product;
use Modules\Common\DTO\OrderProductDTO;
use Modules\OrderProductConverter\Services\OrderProductConverterService;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class OrderProductConverterServiceTest extends TestCase
{
    use RefreshDatabase;

    #[Test()]
    public function get_all_products(): void
    {
        Product::factory()->count(10)->create();
        $orderProductConverterService = resolve(OrderProductConverterService::class);

        $result = $orderProductConverterService->getAllProducts();

        $this->assertInstanceOf(OrderProductDTO::class, $result[0]);
    }
}
