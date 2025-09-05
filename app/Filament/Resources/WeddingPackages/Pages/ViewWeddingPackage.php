<?php

namespace App\Filament\Resources\WeddingPackages\Pages;

use App\Filament\Resources\WeddingPackages\WeddingPackageResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewWeddingPackage extends ViewRecord
{
    protected static string $resource = WeddingPackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
