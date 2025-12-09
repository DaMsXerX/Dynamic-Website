<?php

namespace App\Filament\Resources\SolarInfos\Pages;

use App\Filament\Resources\SolarInfos\SolarInfoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSolarInfos extends ListRecords
{
    protected static string $resource = SolarInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
