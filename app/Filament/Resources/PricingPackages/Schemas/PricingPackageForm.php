<?php

namespace App\Filament\Resources\PricingPackages\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PricingPackageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('plan_name')
                    ->required(),
                TextInput::make('price_label'),
                Toggle::make('is_featured')
                    ->required(),
                TextInput::make('cta_label'),
                TextInput::make('cta_url')
                    ->url(),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
