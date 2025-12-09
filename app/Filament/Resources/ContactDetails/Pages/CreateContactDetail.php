<?php

namespace App\Filament\Resources\ContactDetails\Pages;

use App\Filament\Resources\ContactDetails\ContactDetailResource;
use Filament\Resources\Pages\CreateRecord;

class CreateContactDetail extends CreateRecord
{
    protected static string $resource = ContactDetailResource::class;
}
