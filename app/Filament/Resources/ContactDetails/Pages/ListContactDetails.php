<?php

namespace App\Filament\Resources\ContactDetails\Pages;

use App\Filament\Resources\ContactDetails\ContactDetailResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListContactDetails extends ListRecords
{
    protected static string $resource = ContactDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
