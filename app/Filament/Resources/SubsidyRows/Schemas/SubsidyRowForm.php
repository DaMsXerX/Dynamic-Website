<?php

namespace App\Filament\Resources\SubsidyRows\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SubsidyRowForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('section_slug'),
                TextInput::make('capacity'),
                TextInput::make('central_subsidy'),
                TextInput::make('state_subsidy'),
                TextInput::make('total_subsidy'),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
