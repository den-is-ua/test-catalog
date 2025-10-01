<?php

namespace Modules\Order\Admin\Resources;

use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Modules\Order\Admin\Resources\OrderResource\Pages\CreateOrder;
use Modules\Order\Admin\Resources\OrderResource\Pages\EditOrder;
use Modules\Order\Admin\Resources\OrderResource\Pages\ListOrders;
use Modules\Order\Models\Order;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationGroup = 'Orders';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([

                TextInput::make('username')
                    ->label('Username')
                    ->maxLength(50)
                    ->required(),

                TextInput::make('phone')
                    ->label('Phone')
                    ->maxLength(20)
                    ->required(),

                TextInput::make('total_amount')
                    ->label('Total amount')
                    ->numeric()
                    ->required(),

                Select::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'shipped' => 'Shipped',
                        'delivered' => 'Delivered',
                    ])
                    ->default('pending')
                    ->required(),

                Textarea::make('address')
                    ->label('Address')
                    ->rows(3)
                    ->nullable(),

                Textarea::make('notes')
                    ->label('Notes')
                    ->rows(3)
                    ->nullable(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID')->sortable(),
                TextColumn::make('username')->label('Username')->sortable()->searchable(),
                TextColumn::make('phone')->label('Phone')->sortable()->searchable(),
                TextColumn::make('total_amount')->label('Total')->sortable(),
                TextColumn::make('status')->label('Status')->sortable()->searchable(),
                TextColumn::make('created_at')->label('Created')->dateTime()->sortable(),
            ])
            ->defaultSort('id')
            ->filters([])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListOrders::route('/'),
            'create' => CreateOrder::route('/create'),
            'edit' => EditOrder::route('/{record}/edit'),
        ];
    }
}
