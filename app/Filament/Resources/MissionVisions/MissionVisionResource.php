<?php

namespace App\Filament\Resources\MissionVisions;

use App\Filament\Resources\MissionVisions\Pages\CreateMissionVision;
use App\Filament\Resources\MissionVisions\Pages\EditMissionVision;
use App\Filament\Resources\MissionVisions\Pages\ListMissionVisions;
use App\Filament\Resources\MissionVisions\Schemas\MissionVisionForm;
use App\Filament\Resources\MissionVisions\Tables\MissionVisionsTable;
use App\Models\MissionVision;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class MissionVisionResource extends Resource
{
    protected static ?string $model = MissionVision::class;

    protected static ?int $navigationSort = 1; 
    protected static string|UnitEnum|null $navigationGroup = 'About';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return MissionVisionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MissionVisionsTable::configure($table);
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
            'index' => ListMissionVisions::route('/'),
            'create' => CreateMissionVision::route('/create'),
            'edit' => EditMissionVision::route('/{record}/edit'),
        ];
    }
}
