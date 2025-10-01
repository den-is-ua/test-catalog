<?php

namespace Modules\Order\Admin\Resources\OrderResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Order\Admin\Resources\OrderResource;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;
}
