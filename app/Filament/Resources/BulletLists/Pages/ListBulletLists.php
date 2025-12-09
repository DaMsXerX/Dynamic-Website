<?php

namespace App\Filament\Resources\BulletLists\Pages;

use App\Filament\Resources\BulletLists\BulletListResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBulletLists extends ListRecords
{
    protected static string $resource = BulletListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
