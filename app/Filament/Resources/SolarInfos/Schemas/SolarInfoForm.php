<?php

namespace App\Filament\Resources\SolarInfos\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class SolarInfoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('page_slug')
                    ->label('Select Page')
                    ->options([
                        'home' => 'Home Page',
                        'about' => 'About Us Page',
                        // 'services' => 'Services Page',
                        // 'contact' => 'Contact Page',
                        // 'faq' => 'FAQ Page',
                        // 'blog' => 'Blog Page',
                    ])
                    ->searchable()
                    ->required(),

                RichEditor::make('title')
                    ->label('Title (Rich Text)')
                    ->toolbarButtons([
                        'bold', 'italic', 'underline', 'strike',
                        'link','h1', 'h2', 'h3', 'highlight',
                        'orderedList', 'bulletList',
                        'blockquote', 'codeBlock',
                        'undo', 'redo',
                    ])
                    ->columnSpanFull(),

                RichEditor::make('description')
                    ->label('Description (Rich Text)')
                    ->toolbarButtons([
                        'bold', 'italic', 'underline', 'strike',
                        'link', 'h2', 'h3', 'highlight',
                        'orderedList', 'bulletList',
                        'blockquote', 'codeBlock',
                        'undo', 'redo',
                    ])
                    ->columnSpanFull(),

                TextInput::make('call_heading'),
                TextInput::make('call_number'),

                TextInput::make('icon_url')
                    ->label('Icon URL')
                    ->url(),
            ]);
    }
}
