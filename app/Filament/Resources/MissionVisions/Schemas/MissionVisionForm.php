<?php

namespace App\Filament\Resources\MissionVisions\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class MissionVisionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('page_slug')
                    ->required()
                    ->default('about'),
                TextInput::make('mission_title'),
                Textarea::make('mission_description')
                    ->columnSpanFull(),
                TextInput::make('vision_title'),
                Textarea::make('vision_description')
                    ->columnSpanFull(),
            ]);
    }
}
