<?php

namespace Modules\Catalog\Admin\Resources\ProductResource\Pages;

use Filament\Actions\CreateAction;
use Modules\Catalog\Admin\Resources\ProductResource;
use Filament\Resources\Pages\ListRecords;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;

    protected function getActions(): array
    {
        return [
            CreateAction::make()
        ];
    }
}
