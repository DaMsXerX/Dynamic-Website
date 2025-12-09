<?php

namespace App\Filament\Resources\SubsidyRows\Pages;

use App\Filament\Resources\SubsidyRows\SubsidyRowResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSubsidyRows extends ListRecords
{
    protected static string $resource = SubsidyRowResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
