<?php

namespace App\Filament\Resources\CtaSections;

use App\Filament\Resources\CtaSections\Pages\CreateCtaSection;
use App\Filament\Resources\CtaSections\Pages\EditCtaSection;
use App\Filament\Resources\CtaSections\Pages\ListCtaSections;
use App\Filament\Resources\CtaSections\Schemas\CtaSectionForm;
use App\Filament\Resources\CtaSections\Tables\CtaSectionsTable;
use App\Models\CtaSection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class CtaSectionResource extends Resource
{
    protected static ?string $model = CtaSection::class;

    protected static ?int $navigationSort = 4; 
    protected static string|UnitEnum|null $navigationGroup = 'Common';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return CtaSectionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CtaSectionsTable::configure($table);
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
            'index' => ListCtaSections::route('/'),
            'create' => CreateCtaSection::route('/create'),
            'edit' => EditCtaSection::route('/{record}/edit'),
        ];
    }
}
