<?php

namespace Modules\Catalog\Admin\Resources\ProductResource\Pages;

use Modules\Catalog\Admin\Resources\ProductResource;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;
}
