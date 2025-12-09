<?php

namespace App\Filament\Resources\SubsidyRows\Pages;

use App\Filament\Resources\SubsidyRows\SubsidyRowResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSubsidyRow extends EditRecord
{
    protected static string $resource = SubsidyRowResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
