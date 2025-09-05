<?php

namespace App\Filament\Resources\WeddingTestimonials\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class WeddingTestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('photo')
                    ->required(),
                TextInput::make('occupation')
                    ->required(),
                Textarea::make('message')
                    ->required()
                    ->columnSpanFull(),
                Select::make('wedding_package_id')
                    ->relationship('weddingPackage', 'name')
                    ->required(),
            ]);
    }
}
