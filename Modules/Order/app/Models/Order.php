<?php

namespace Modules\Order\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Order\Database\Factories\OrderFactory;

/**
 * @property int $id
 * @property string $username
 * @property string $phone
 * @property int $total_amount
 * @property 'pending'|'confirmed'|'shipped'|'delivered' $status
 * @property string|null $address
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Order\Models\OrderItem> $items
 */
class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'username',
        'phone',
        'total_amount',
        'status',
        'address',
        'notes',
    ];

    protected static function newFactory(): Factory
    {
        return OrderFactory::new();
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
