<?php

namespace App\Filament\Resources\ServiceProcessSteps\Pages;

use App\Filament\Resources\ServiceProcessSteps\ServiceProcessStepResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditServiceProcessStep extends EditRecord
{
    protected static string $resource = ServiceProcessStepResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
