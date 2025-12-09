<?php

namespace App\Filament\Resources\SolarInfos;

use App\Filament\Resources\SolarInfos\Pages\CreateSolarInfo;
use App\Filament\Resources\SolarInfos\Pages\EditSolarInfo;
use App\Filament\Resources\SolarInfos\Pages\ListSolarInfos;
use App\Filament\Resources\SolarInfos\Schemas\SolarInfoForm;
use App\Filament\Resources\SolarInfos\Tables\SolarInfosTable;
use App\Models\SolarInfo;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class SolarInfoResource extends Resource
{
    protected static ?string $model = SolarInfo::class;

    protected static ?int $navigationSort = 5; 
    protected static string|UnitEnum|null $navigationGroup = 'Common';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return SolarInfoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SolarInfosTable::configure($table);
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
            'index' => ListSolarInfos::route('/'),
            'create' => CreateSolarInfo::route('/create'),
            'edit' => EditSolarInfo::route('/{record}/edit'),
        ];
    }
}
