<?php

namespace App\Filament\Resources\WeddingPackages\Pages;

use App\Filament\Resources\WeddingPackages\WeddingPackageResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditWeddingPackage extends EditRecord
{
    protected static string $resource = WeddingPackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
