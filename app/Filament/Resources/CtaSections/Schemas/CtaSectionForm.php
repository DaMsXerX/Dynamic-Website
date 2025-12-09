<?php

namespace App\Filament\Resources\CtaSections\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CtaSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('page_slug'),
                TextInput::make('headline'),
                Textarea::make('subtext')
                    ->columnSpanFull(),
                TextInput::make('button_text'),
                TextInput::make('button_url')
                    ->url(),
            ]);
    }
}
