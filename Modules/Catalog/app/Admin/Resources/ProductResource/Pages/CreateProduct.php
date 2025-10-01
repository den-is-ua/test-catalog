<?php

namespace Modules\Catalog\Admin\Resources\ProductResource\Pages;

use Modules\Catalog\Admin\Resources\ProductResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;
}
