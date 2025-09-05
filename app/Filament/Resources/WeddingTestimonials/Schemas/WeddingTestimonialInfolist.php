<?php

namespace App\Filament\Resources\WeddingTestimonials\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class WeddingTestimonialInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('photo'),
                TextEntry::make('occupation'),
                TextEntry::make('weddingPackage.name'),
                TextEntry::make('deleted_at')
                    ->dateTime(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
