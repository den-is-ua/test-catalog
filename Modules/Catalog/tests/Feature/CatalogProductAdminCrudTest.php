<?php

use Modules\Catalog\Admin\Resources\ProductResource\Pages\ListProducts;
use Modules\Catalog\Admin\Resources\ProductResource\Pages\CreateProduct;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Modules\Catalog\Models\Product;
use Modules\Catalog\Models\Category;
use function Pest\Laravel\{actingAs, assertDatabaseHas};
use function Pest\Livewire\{livewire};

uses(Tests\TestCase::class);
uses(RefreshDatabase::class);

beforeEach(function () {
    $user = User::factory()->create();
    actingAs($user);
});

test('admin can view products index page', function () {
    $products = Product::factory()->count(5)->create();

    livewire(ListProducts::class)
        ->assertOk()
        ->assertCanSeeTableRecords($products);
});

test('admin can view creation page', function () {
    livewire(CreateProduct::class)
        ->assertOk();
});

it('can create a product', function () {
    $category = Category::factory()->create();
    $product = Product::factory()->make();

    livewire(CreateProduct::class)
        ->fillForm([
            'category_id' => $category->id,
            'name' => $product->name,
            'price' => $product->price,
            'qty' => $product->qty
        ])
        ->call('create')
        ->assertNotified()
        ->assertRedirect();

    assertDatabaseHas(Product::class, [
        'name' => $product->name,
    ]);
});