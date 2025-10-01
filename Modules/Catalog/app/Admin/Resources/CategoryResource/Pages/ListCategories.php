<?php

namespace Modules\Catalog\Admin\Resources\CategoryResource\Pages;

use Filament\Actions\CreateAction;
use Modules\Catalog\Admin\Resources\CategoryResource;
use Filament\Resources\Pages\ListRecords;

class ListCategories extends ListRecords
{
    protected static string $resource = CategoryResource::class;

    protected function getActions(): array
    {
        return [
            CreateAction::make()
        ];
    }
}
