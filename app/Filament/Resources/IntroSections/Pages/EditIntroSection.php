<?php

namespace App\Filament\Resources\IntroSections\Pages;

use App\Filament\Resources\IntroSections\IntroSectionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditIntroSection extends EditRecord
{
    protected static string $resource = IntroSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
