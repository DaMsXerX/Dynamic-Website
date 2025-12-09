<?php

namespace App\Filament\Resources\MissionVisions\Pages;

use App\Filament\Resources\MissionVisions\MissionVisionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMissionVisions extends ListRecords
{
    protected static string $resource = MissionVisionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
