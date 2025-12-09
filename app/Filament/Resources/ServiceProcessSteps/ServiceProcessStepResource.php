<?php

namespace App\Filament\Resources\ServiceProcessSteps;

use App\Filament\Resources\ServiceProcessSteps\Pages\CreateServiceProcessStep;
use App\Filament\Resources\ServiceProcessSteps\Pages\EditServiceProcessStep;
use App\Filament\Resources\ServiceProcessSteps\Pages\ListServiceProcessSteps;
use App\Filament\Resources\ServiceProcessSteps\Schemas\ServiceProcessStepForm;
use App\Filament\Resources\ServiceProcessSteps\Tables\ServiceProcessStepsTable;
use App\Models\ServiceProcessStep;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ServiceProcessStepResource extends Resource
{
    protected static ?string $model = ServiceProcessStep::class;

    protected static ?int $navigationSort = 1; 
    protected static string|UnitEnum|null $navigationGroup = 'Service';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ServiceProcessStepForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ServiceProcessStepsTable::configure($table);
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
            'index' => ListServiceProcessSteps::route('/'),
            'create' => CreateServiceProcessStep::route('/create'),
            'edit' => EditServiceProcessStep::route('/{record}/edit'),
        ];
    }
}
