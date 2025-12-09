<?php

namespace App\Filament\Resources\IntroSections\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class IntroSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('heading'),
                TextInput::make('highlight_text'),
                Textarea::make('paragraph1')
                    ->columnSpanFull(),
                Textarea::make('paragraph2')
                    ->columnSpanFull(),
                TextInput::make('button_text'),
                TextInput::make('button_link'),
                TextInput::make('button_bg_color')
                    ->required()
                    ->default('#004b92'),
                TextInput::make('button_text_color')
                    ->required()
                    ->default('#004b92'),
                FileUpload::make('image')
                    ->directory('intro-sections')
                    ->disk('public')
                    ->visibility('public')
                    ->image()
                    ->preserveFilenames(),
                TextInput::make('footer_text'),
            ]);
    }
}
