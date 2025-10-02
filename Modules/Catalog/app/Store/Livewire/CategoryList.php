<?php

declare(strict_types=1);

namespace Modules\Catalog\Store\Livewire;

use Livewire\Component;
use Modules\Catalog\Models\Category;



class CategoryList extends Component
{
    public ?int $activeId = null;

    public function select(?int $id): void
    {
        $this->activeId = $id;
        // Tell other components about the change
        $this->dispatch('category-selected', id: $id);
    }

    public function render()
    {
        $categories = Category::query()
            ->orderByDesc('id')
            ->get();

        return view('catalog::livewire.category-list', compact('categories'));
    }
}
