<?php

namespace App\Filament\Resources\PMSubsidies;

use App\Filament\Resources\PMSubsidies\Pages\CreatePMSubsidy;
use App\Filament\Resources\PMSubsidies\Pages\EditPMSubsidy;
use App\Filament\Resources\PMSubsidies\Pages\ListPMSubsidies;
use App\Filament\Resources\PMSubsidies\Schemas\PMSubsidyForm;
use App\Filament\Resources\PMSubsidies\Tables\PMSubsidiesTable;
use App\Models\PMSubsidy;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PMSubsidyResource extends Resource
{
    protected static ?string $model = PMSubsidy::class;


    protected static ?int $navigationSort = 7; 
    protected static string|UnitEnum|null $navigationGroup = 'Home';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return PMSubsidyForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PMSubsidiesTable::configure($table);
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
            'index' => ListPMSubsidies::route('/'),
            'create' => CreatePMSubsidy::route('/create'),
            'edit' => EditPMSubsidy::route('/{record}/edit'),
        ];
    }
}
