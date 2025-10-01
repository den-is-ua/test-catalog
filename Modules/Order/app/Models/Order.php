<?php

namespace Modules\Order\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Order\Database\Factories\OrderFactory;

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
}
