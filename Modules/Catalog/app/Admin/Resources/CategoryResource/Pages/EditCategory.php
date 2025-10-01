<?php

namespace Modules\Catalog\Admin\Resources\CategoryResource\Pages;

use Filament\Resources\Pages\EditRecord;
use Modules\Catalog\Admin\Resources\CategoryResource;

class EditCategory extends EditRecord
{
    protected static string $resource = CategoryResource::class;
}
