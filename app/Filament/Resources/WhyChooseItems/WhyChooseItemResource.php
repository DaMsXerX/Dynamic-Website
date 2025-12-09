<?php

namespace App\Filament\Resources\WhyChooseItems;

use App\Filament\Resources\WhyChooseItems\Pages\CreateWhyChooseItem;
use App\Filament\Resources\WhyChooseItems\Pages\EditWhyChooseItem;
use App\Filament\Resources\WhyChooseItems\Pages\ListWhyChooseItems;
use App\Filament\Resources\WhyChooseItems\Schemas\WhyChooseItemForm;
use App\Filament\Resources\WhyChooseItems\Tables\WhyChooseItemsTable;
use App\Models\WhyChooseItem;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class WhyChooseItemResource extends Resource
{
    protected static ?string $model = WhyChooseItem::class;

    protected static ?int $navigationSort = 3; 
    protected static string|UnitEnum|null $navigationGroup = 'Common';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return WhyChooseItemForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WhyChooseItemsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListWhyChooseItems::route('/'),
            'create' => CreateWhyChooseItem::route('/create'),
            'edit' => EditWhyChooseItem::route('/{record}/edit'),
        ];
    }
}
