<?php

use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {
    Route::view('create-order', 'order::pages.create')->name(name: 'order.create');
});
