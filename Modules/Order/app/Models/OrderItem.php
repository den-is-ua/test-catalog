<?php

namespace Modules\Order\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Common\Contracts\DTO\OrderProductDTOContract;
use Modules\Order\Database\Factories\OrderItemFactory;

class OrderItem extends Model implements OrderProductDTOContract
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'qty',
    ];

    protected static function newFactory(): OrderItemFactory
    {
        return OrderItemFactory::new();
    }

    public function getProductId(): int
    {
        return $this->attributes['product_id'];
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function getQty(): int
    {
        return $this->attributes['qty'];
    }
}
