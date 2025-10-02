<?php

use Illuminate\Support\Facades\Route;
use Modules\Order\Http\Controllers\OrderController;

Route::middleware('web')->group(function () {
    Route::view('create-order', 'order::pages.create')->name(name: 'order.create');
});

