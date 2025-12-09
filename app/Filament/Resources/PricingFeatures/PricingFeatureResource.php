<?php

namespace App\Filament\Resources\PricingFeatures;

use App\Filament\Resources\PricingFeatures\Pages\CreatePricingFeature;
use App\Filament\Resources\PricingFeatures\Pages\EditPricingFeature;
use App\Filament\Resources\PricingFeatures\Pages\ListPricingFeatures;
use App\Filament\Resources\PricingFeatures\Schemas\PricingFeatureForm;
use App\Filament\Resources\PricingFeatures\Tables\PricingFeaturesTable;
use App\Models\PricingFeature;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PricingFeatureResource extends Resource
{
    protected static ?string $model = PricingFeature::class;

    protected static ?int $navigationSort = 5; 
    protected static string|UnitEnum|null $navigationGroup = 'Home';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return PricingFeatureForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PricingFeaturesTable::configure($table);
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
            'index' => ListPricingFeatures::route('/'),
            'create' => CreatePricingFeature::route('/create'),
            'edit' => EditPricingFeature::route('/{record}/edit'),
        ];
    }
}
