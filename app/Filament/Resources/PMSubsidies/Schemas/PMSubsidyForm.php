<?php

namespace App\Filament\Resources\PMSubsidies\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PMSubsidyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('capacity')
                    ->required(),
                TextInput::make('amount')
                    ->required(),
                TextInput::make('note'),
            ]);
    }
}
