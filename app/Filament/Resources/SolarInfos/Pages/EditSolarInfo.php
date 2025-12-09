<?php

namespace App\Filament\Resources\SolarInfos\Pages;

use App\Filament\Resources\SolarInfos\SolarInfoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSolarInfo extends EditRecord
{
    protected static string $resource = SolarInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
