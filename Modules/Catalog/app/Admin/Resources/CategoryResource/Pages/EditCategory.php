<?php

namespace Modules\Catalog\Admin\Resources\CategoryResource\Pages;

use Modules\Catalog\Admin\Resources\CategoryResource;
use Filament\Resources\Pages\EditRecord;

class EditCategory extends EditRecord
{
    protected static string $resource = CategoryResource::class;
}
