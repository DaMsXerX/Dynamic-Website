<?php

namespace App\Filament\Resources\SectionHeadings\Pages;

use App\Filament\Resources\SectionHeadings\SectionHeadingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSectionHeadings extends ListRecords
{
    protected static string $resource = SectionHeadingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
