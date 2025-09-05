<?php

namespace App\Filament\Resources\WeddingTestimonials\Schemas;

use Filament\Forms\Components\FileUpload;
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
                TextInput::make('occupation')
                    ->required(),
                Select::make('wedding_package_id')
                    ->relationship('weddingPackage', 'name')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('message')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('photo')
                    ->image()
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
