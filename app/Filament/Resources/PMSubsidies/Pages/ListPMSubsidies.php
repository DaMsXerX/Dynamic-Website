<?php

namespace App\Filament\Resources\PMSubsidies\Pages;

use App\Filament\Resources\PMSubsidies\PMSubsidyResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPMSubsidies extends ListRecords
{
    protected static string $resource = PMSubsidyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
