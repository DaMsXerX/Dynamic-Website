<?php

namespace App\Filament\Resources\IntroSections\Pages;

use App\Filament\Resources\IntroSections\IntroSectionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListIntroSections extends ListRecords
{
    protected static string $resource = IntroSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
