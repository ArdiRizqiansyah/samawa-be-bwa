<?php

namespace App\Filament\Resources\WeddingTestimonials\Pages;

use App\Filament\Resources\WeddingTestimonials\WeddingTestimonialResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewWeddingTestimonial extends ViewRecord
{
    protected static string $resource = WeddingTestimonialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
