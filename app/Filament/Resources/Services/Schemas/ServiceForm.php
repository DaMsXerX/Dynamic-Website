<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->label('Service Image')
                    ->image()
                    ->disk('public')        // make sure disk is set to 'public'
                    ->directory('services') // folder in storage/app/public
                    ->visibility('public')
                    ->preserveFilenames(),
                TextInput::make('cta_label'),
                TextInput::make('cta_url')
                    ->url(),
        //         Select::make('category')
        //             ->options([
        //     'residential' => 'Residential',
        //     'commercial' => 'Commercial',
        //     'industrial' => 'Industrial',
        //     'other' => 'Other',
        // ])
        //             ->default('other')
        //             ->required(),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
