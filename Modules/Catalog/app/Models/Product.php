<?php

namespace Modules\Catalog\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Catalog\Database\Factories\ProductFactory;
use Modules\Common\Contracts\DTO\ProductDTOContract;

class Product extends Model implements ProductDTOContract
{
    use HasFactory;

    public int $id;
    public string $name;
    public string $description;
    public int $price;
    public int $qty;

    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'name',
        'price',
        'description',
        'qty',
    ];

    protected static function newFactory(): Factory
    {
        return ProductFactory::new();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getQty(): int
    {
        return $this->qty;
    }

    /**
     * Category relation.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
