<?php

declare(strict_types=1);

namespace Modules\Catalog\Store\Livewire;

use Livewire\Component;
use Modules\Catalog\Models\Category;

class CategoryList extends Component
{
    public ?int $activeId = null;

    public function select(?int $id = null): void
    {
        $this->activeId = $id;

        $this->dispatch('category-selected', id: $id);
    }

    public function render()
    {
        $categories = Category::query()
            ->orderByDesc('id')
            ->get();

        $categories->unshift(new Category(['id' => null, 'name' => 'All categories']));

        return view('catalog::livewire.category-list', compact('categories'));
    }
}
