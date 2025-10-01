<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Order\Admin\Resources\OrderResource\Pages\CreateOrder;
use Modules\Order\Admin\Resources\OrderResource\Pages\ListOrders;
use Modules\Order\Models\Order;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Livewire\livewire;

uses(Tests\TestCase::class);
uses(RefreshDatabase::class);

beforeEach(function () {
    $user = User::factory()->create();
    actingAs($user);
});

test('admin can view orders index page', function () {
    $orders = Order::factory()->count(5)->create();

    livewire(ListOrders::class)
        ->assertOk()
        ->assertCanSeeTableRecords($orders);
});

test('admin can view creation page', function () {
    livewire(CreateOrder::class)
        ->assertOk();
});

it('can create an order', function () {
    $order = Order::factory()->make();

    livewire(CreateOrder::class)
        ->fillForm([
            'username' => $order->username,
            'phone' => $order->phone,
            'total_amount' => $order->total_amount,
            'status' => $order->status,
            'address' => $order->address,
            'notes' => $order->notes,
        ])
        ->call('create')
        ->assertNotified()
        ->assertRedirect();

    assertDatabaseHas(Order::class, [
        'username' => $order->username,
        'phone' => $order->phone,
        'total_amount' => $order->total_amount,
        'status' => $order->status,
    ]);
});
