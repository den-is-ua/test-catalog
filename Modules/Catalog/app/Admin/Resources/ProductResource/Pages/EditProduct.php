<?php

namespace Modules\Catalog\Admin\Resources\ProductResource\Pages;

use Filament\Resources\Pages\EditRecord;
use Modules\Catalog\Admin\Resources\ProductResource;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;
}
