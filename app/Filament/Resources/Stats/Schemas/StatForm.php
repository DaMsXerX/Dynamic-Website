<?php

namespace App\Filament\Resources\Stats\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StatForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title'),
                TextInput::make('value'),
                TextInput::make('icon_url')
                    ->url(),
                TextInput::make('page_slug'),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
