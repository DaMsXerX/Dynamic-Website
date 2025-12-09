<?php

namespace App\Filament\Resources\SubsidyRows;

use App\Filament\Resources\SubsidyRows\Pages\CreateSubsidyRow;
use App\Filament\Resources\SubsidyRows\Pages\EditSubsidyRow;
use App\Filament\Resources\SubsidyRows\Pages\ListSubsidyRows;
use App\Filament\Resources\SubsidyRows\Schemas\SubsidyRowForm;
use App\Filament\Resources\SubsidyRows\Tables\SubsidyRowsTable;
use App\Models\SubsidyRow;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class SubsidyRowResource extends Resource
{
    protected static ?string $model = SubsidyRow::class;

    protected static ?int $navigationSort = 2   ; 
    protected static string|UnitEnum|null $navigationGroup = 'Home';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return SubsidyRowForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SubsidyRowsTable::configure($table);
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
            'index' => ListSubsidyRows::route('/'),
            'create' => CreateSubsidyRow::route('/create'),
            'edit' => EditSubsidyRow::route('/{record}/edit'),
        ];
    }
}
