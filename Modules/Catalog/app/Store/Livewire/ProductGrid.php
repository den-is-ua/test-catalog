<?php

declare(strict_types=1);

namespace Modules\Catalog\Store\Livewire;

use Livewire\Component;
use Modules\Catalog\Models\Product;

class ProductGrid extends Component
{
    public ?int $categoryId = null;

    protected $listeners = [
        // Listen for the category selection event fired from CategoryList
        'category-selected' => 'onCategorySelected',
    ];

    public function onCategorySelected($id = null): void
    {
        $this->categoryId = $id === null ? null : (int) $id;
    }

    public function render()
    {
        $query = Product::query()->orderByDesc('id');

        if ($this->categoryId !== null) {
            $query->where('category_id', $this->categoryId);
        }

        $products = $query->get();

        return view('catalog::livewire.product-grid', compact('products'));
    }
}
