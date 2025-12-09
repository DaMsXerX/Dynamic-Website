<?php

namespace App\Filament\Resources\SectionHeadings;

use App\Filament\Resources\SectionHeadings\Pages\CreateSectionHeading;
use App\Filament\Resources\SectionHeadings\Pages\EditSectionHeading;
use App\Filament\Resources\SectionHeadings\Pages\ListSectionHeadings;
use App\Filament\Resources\SectionHeadings\Schemas\SectionHeadingForm;
use App\Filament\Resources\SectionHeadings\Tables\SectionHeadingsTable;
use App\Models\SectionHeading;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class SectionHeadingResource extends Resource
{
    protected static ?string $model = SectionHeading::class;

    protected static ?int $navigationSort = 1; 
    protected static string|UnitEnum|null $navigationGroup = 'All Headings';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return SectionHeadingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SectionHeadingsTable::configure($table);
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
            'index' => ListSectionHeadings::route('/'),
            'create' => CreateSectionHeading::route('/create'),
            'edit' => EditSectionHeading::route('/{record}/edit'),
        ];
    }
}
