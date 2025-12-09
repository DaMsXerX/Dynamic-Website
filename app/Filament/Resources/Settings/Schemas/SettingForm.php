<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload; 


class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('site_name'),
                // File upload for logo
                FileUpload::make('logo_path')
                    ->label('Logo')
                    ->image() // only allow images
                    ->directory('logos') // store in storage/app/public/logos
                    ->disk('public') // use public disk
                    ->required(),
                TextInput::make('primary_phone')
                    ->tel(),
                TextInput::make('secondary_phone')
                    ->tel(),
                TextInput::make('support_email')
                    ->email(),
                TextInput::make('address_line1'),
                TextInput::make('address_line2'),
                TextInput::make('city'),
                TextInput::make('state'),
                TextInput::make('pincode'),
                Textarea::make('map_embed_url')
                    ->columnSpanFull(),
                Textarea::make('footer_about')
                    ->columnSpanFull(),
                Textarea::make('footer_text')
                    ->columnSpanFull(),
                // TextInput::make('social_links'),
                Repeater::make('social_links')
    ->schema([
        TextInput::make('platform')->placeholder('facebook / instagram / youtube'),
        TextInput::make('url')->url()->placeholder('https://'),
    ])
    ->default([])
    ->columnSpanFull(),
                TextInput::make('web3forms_key'),
            ]);
    }
}
