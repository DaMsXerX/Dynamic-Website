<?php

namespace App\Filament\Resources\ServiceProcessSteps\Pages;

use App\Filament\Resources\ServiceProcessSteps\ServiceProcessStepResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListServiceProcessSteps extends ListRecords
{
    protected static string $resource = ServiceProcessStepResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
