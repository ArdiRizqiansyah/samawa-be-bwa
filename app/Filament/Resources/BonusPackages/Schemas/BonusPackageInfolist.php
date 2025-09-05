<?php

namespace App\Filament\Resources\BonusPackages\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class BonusPackageInfolist
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
                TextEntry::make('deleted_at')
                    ->dateTime(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
