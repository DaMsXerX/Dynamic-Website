<?php

namespace App\Filament\Resources\IntroSections\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class IntroSectionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('heading')
                    ->searchable(),
                TextColumn::make('highlight_text')
                    ->searchable(),
                TextColumn::make('button_text')
                    ->searchable(),
                TextColumn::make('button_link')
                    ->searchable(),
                TextColumn::make('button_bg_color')
                    ->searchable(),
                TextColumn::make('button_text_color')
                    ->searchable(),
                ImageColumn::make('image'),
                TextColumn::make('footer_text')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
