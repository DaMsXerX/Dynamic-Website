<?php

namespace App\Filament\Resources\Menus\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
class MenusTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
        TextColumn::make('label')->sortable(),
        TextColumn::make('url')
        ->url(fn ($record) => $record->url), // provide the URL dynamically
        
        TextColumn::make('order')->sortable(),
        IconColumn::make('is_active')->boolean(),
    ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
