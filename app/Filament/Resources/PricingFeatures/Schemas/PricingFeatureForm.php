<?php

namespace App\Filament\Resources\PricingFeatures\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PricingFeatureForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('pricing_package_id')
                    ->required()
                    ->numeric(),
                TextInput::make('description')
                    ->required(),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
