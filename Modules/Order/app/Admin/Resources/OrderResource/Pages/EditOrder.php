<?php

namespace Modules\Order\Admin\Resources\OrderResource\Pages;

use Filament\Resources\Pages\EditRecord;
use Modules\Order\Admin\Resources\OrderResource;

class EditOrder extends EditRecord
{
    protected static string $resource = OrderResource::class;
}
