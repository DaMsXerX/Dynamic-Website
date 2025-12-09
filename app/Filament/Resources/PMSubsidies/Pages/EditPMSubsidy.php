<?php

namespace App\Filament\Resources\PMSubsidies\Pages;

use App\Filament\Resources\PMSubsidies\PMSubsidyResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPMSubsidy extends EditRecord
{
    protected static string $resource = PMSubsidyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
