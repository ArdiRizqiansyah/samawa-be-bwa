<?php

namespace App\Filament\Resources\BonusPackages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class BonusPackageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                    TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('IDR'),
                Textarea::make('about')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('thumbnail')
                    ->image()
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
