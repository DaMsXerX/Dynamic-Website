<?php

namespace App\Filament\Resources\WhyChooseItems\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;

class WhyChooseItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title'),
                Textarea::make('description')
                    ->columnSpanFull(),
                FileUpload::make('icon_url')
                    ->label('Icon')
                    ->image()
                    ->disk('public') 
                    ->directory('why-choose-icons')
                    ->preserveFilenames()
                    ->imageEditor(),
                TextInput::make('page_slug'),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
