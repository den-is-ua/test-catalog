<?php

namespace Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    protected static function newFactory()
    {
        return \Modules\Order\Database\Factories\OrderFactory::new();
    }

}
