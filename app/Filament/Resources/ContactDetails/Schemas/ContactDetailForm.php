<?php

namespace App\Filament\Resources\ContactDetails\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ContactDetailForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Section Title')
                    ->placeholder('Get in Touch')
                    ->required(),

                Textarea::make('description')
                    ->label('Short Description')
                    ->rows(3)
                    ->columnSpanFull(),

                // PHONE
                TextInput::make('phone_heading')
                    ->label('Phone Heading')
                    ->default('Phone')
                    ->required(),

                TextInput::make('phone_value')
                    ->label('Phone Number')
                    ->tel(),

                // EMAIL
                TextInput::make('email_heading')
                    ->label('Email Heading')
                    ->default('Email')
                    ->required(),

                TextInput::make('email_value')
                    ->label('Email Address')
                    ->email(),

                // ADDRESS
                TextInput::make('address_heading')
                    ->label('Address Heading')
                    ->default('Address')
                    ->required(),

                Textarea::make('address_value')
                    ->label('Address Content')
                    ->rows(4)
                    ->columnSpanFull(),

                // MAP
                Textarea::make('map_embed_url')
                    ->label('Google Map Embed Code')
                    ->placeholder('<iframe ...></iframe>')
                    ->rows(4)
                    ->columnSpanFull(),
            ]);
    }
}
