<?php

namespace App\Filament\Resources\IntroSections;

use App\Filament\Resources\IntroSections\Pages\CreateIntroSection;
use App\Filament\Resources\IntroSections\Pages\EditIntroSection;
use App\Filament\Resources\IntroSections\Pages\ListIntroSections;
use App\Filament\Resources\IntroSections\Schemas\IntroSectionForm;
use App\Filament\Resources\IntroSections\Tables\IntroSectionsTable;
use App\Models\IntroSection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class IntroSectionResource extends Resource
{
    protected static ?string $model = IntroSection::class;

    protected static ?int $navigationSort = 1;
    protected static string|UnitEnum|null $navigationGroup = 'Common';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return IntroSectionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return IntroSectionsTable::configure($table);
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
            'index' => ListIntroSections::route('/'),
            'create' => CreateIntroSection::route('/create'),
            'edit' => EditIntroSection::route('/{record}/edit'),
        ];
    }
}
