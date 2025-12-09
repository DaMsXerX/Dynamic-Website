<?php

namespace App\Filament\Resources\BulletLists\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class BulletListForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // TextInput::make('section_slug'),
                 
                
                // Main text
                Textarea::make('text')
                    ->label('Text')
                    ->rows(3)
                    ->required()
                    ->columnSpanFull(),


                // TextInput::make('subtitle')
                //     ->label('Subtitle')
                //     ->nullable(),

                // TextInput::make('amount')
                //     ->label('Amount')
                //     ->numeric()
                //     ->nullable(),

                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
