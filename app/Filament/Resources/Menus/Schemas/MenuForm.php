<?php

namespace App\Filament\Resources\Menus\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;

class MenuForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
        TextInput::make('label')
            ->required()
            ->maxLength(255),
        TextInput::make('url')
            ->required()
            ->url(),
        TextInput::make('order')
            ->numeric()
            ->default(0),
        Toggle::make('is_active')
            ->default(true),
    ]);
    }
}
