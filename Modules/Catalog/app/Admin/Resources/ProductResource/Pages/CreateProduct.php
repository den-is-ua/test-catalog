<?php

namespace Modules\Catalog\Admin\Resources\ProductResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Catalog\Admin\Resources\ProductResource;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;
}
