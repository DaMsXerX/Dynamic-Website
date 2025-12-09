<?php

namespace App\Filament\Resources\BulletLists\Pages;

use App\Filament\Resources\BulletLists\BulletListResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBulletList extends EditRecord
{
    protected static string $resource = BulletListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
