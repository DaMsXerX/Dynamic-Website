<?php

namespace App\Filament\Resources\PricingFeatures\Pages;

use App\Filament\Resources\PricingFeatures\PricingFeatureResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPricingFeature extends EditRecord
{
    protected static string $resource = PricingFeatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
