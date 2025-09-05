<?php

namespace App\Filament\Resources\WeddingOrganizers\Pages;

use App\Filament\Resources\WeddingOrganizers\WeddingOrganizerResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewWeddingOrganizer extends ViewRecord
{
    protected static string $resource = WeddingOrganizerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
