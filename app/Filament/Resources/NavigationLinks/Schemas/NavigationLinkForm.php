<?php

namespace App\Filament\Resources\NavigationLinks\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class NavigationLinkForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //  TextInput::make('settings_id')
                //     ->label('Settings ID')
                //     ->numeric()
                //     ->default(1) // default value
                //     ->required(),

                TextInput::make('label')
                    ->label('Link Label')
                    ->required()
                    ->maxLength(50),

                TextInput::make('url')
                    ->label('Link URL')
                    ->url(false)
                    ->required()
                    ->placeholder('ex: /about')
                    
                    
                    ->maxLength(255),

                TextInput::make('order')
                    ->label('Sort Order')
                    ->numeric()
                    ->default(0)
                    ->required(),

                Toggle::make('is_primary')
                    ->label('Quick Link')
                    ->default(true)
                    ->required(),
            ]);
    }
}
