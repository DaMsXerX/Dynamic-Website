<?php

namespace App\Filament\Resources\Heroes\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class HeroForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('page_slug')
                    ->required(),
                TextInput::make('title'),
                TextInput::make('highlight_text')
    
                ->placeholder('Example: ₹78,000'),

                TextInput::make('highlight_blue'),
                 
         
                TextInput::make('subtitle'),
                Textarea::make('description')
                    ->columnSpanFull(),
                FileUpload::make('primary_image')
                    ->image()
                    ->disk('public')           // make sure this disk exists
    ->directory('heroes')      // optional: saves in storage/app/public/heroes
    ->visibility('public'),
                FileUpload::make('background_image')
                    ->image()
                    ->disk('public')           // make sure this disk exists
    ->directory('heroes')      // optional: saves in storage/app/public/heroes
    ->visibility('public'),
                TextInput::make('badge_text'),
                TextInput::make('cta_label'),
                TextInput::make('cta_url')
                    ->url(),
                Select::make('theme')
                    ->options(['light' => 'Light', 'dark' => 'Dark'])
                    ->default('light')
                    ->required(),
            ]);
    }
}
