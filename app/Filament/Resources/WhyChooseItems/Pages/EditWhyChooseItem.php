<?php

namespace App\Filament\Resources\WhyChooseItems\Pages;

use App\Filament\Resources\WhyChooseItems\WhyChooseItemResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditWhyChooseItem extends EditRecord
{
    protected static string $resource = WhyChooseItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
