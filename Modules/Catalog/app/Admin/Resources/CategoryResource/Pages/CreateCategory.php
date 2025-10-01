<?php

namespace Modules\Catalog\Admin\Resources\CategoryResource\Pages;

use Modules\Catalog\Admin\Resources\CategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;
}
