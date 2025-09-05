<?php

namespace App\Filament\Resources\BonusPackages\Pages;

use App\Filament\Resources\BonusPackages\BonusPackageResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewBonusPackage extends ViewRecord
{
    protected static string $resource = BonusPackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
