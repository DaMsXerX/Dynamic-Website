<?php

namespace App\Filament\Resources\SectionHeadings\Pages;

use App\Filament\Resources\SectionHeadings\SectionHeadingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSectionHeading extends EditRecord
{
    protected static string $resource = SectionHeadingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
