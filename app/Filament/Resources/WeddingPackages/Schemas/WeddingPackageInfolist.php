<?php

namespace App\Filament\Resources\WeddingPackages\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class WeddingPackageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('slug'),
                TextEntry::make('thumbnail'),
                TextEntry::make('price')
                    ->money(),
                IconEntry::make('is_popular')
                    ->boolean(),
                TextEntry::make('city.name'),
                TextEntry::make('weddingOrganizer.name'),
                TextEntry::make('deleted_at')
                    ->dateTime(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
