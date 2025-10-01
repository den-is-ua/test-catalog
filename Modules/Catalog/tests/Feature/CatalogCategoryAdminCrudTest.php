<?php

use Modules\Catalog\Admin\Resources\CategoryResource\Pages\ListCategories;
use Modules\Catalog\Admin\Resources\CategoryResource\Pages\CreateCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Modules\Catalog\Models\Category;
use function Pest\Laravel\{actingAs, assertDatabaseHas};
use function Pest\Livewire\{livewire};

uses(Tests\TestCase::class);
uses(RefreshDatabase::class);

beforeEach(function () {
    $user = User::factory()->create();
    actingAs($user);
});

test('admin can view categories index page', function () {
    $categories = Category::factory()->count(5)->create();

    livewire(ListCategories::class)
        ->assertOk()
        ->assertCanSeeTableRecords($categories);
});

test('admin can view creation page', function () {
    livewire(CreateCategory::class)
        ->assertOk();
});

it('can create a category', function () {
    $category = Category::factory()->make();

    livewire(CreateCategory::class)
        ->fillForm([
            'name' => $category->name,
        ])
        ->call('create')
        ->assertNotified()
        ->assertRedirect();

    assertDatabaseHas(Category::class, [
        'name' => $category->name,
    ]);
});