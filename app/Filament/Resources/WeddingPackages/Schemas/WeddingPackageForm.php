<?php

namespace App\Filament\Resources\WeddingPackages\Schemas;

use App\Models\BonusPackage;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

class WeddingPackageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Fieldset::make('Package Details')
                    ->schema([
                        TextInput::make('name')
                            ->required(),
                        FileUpload::make('thumbnail')
                            ->image()
                            ->required(),
                        Textarea::make('about')
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('$'),
                    ]),

                FieldSet::make('Media & Bonuses')
                    ->schema([
                        Repeater::make('photos')
                            ->relationship('photos')
                            ->schema([
                                FileUpload::make('photo')
                                    ->image()
                                    ->required(),
                            ]),
                        Repeater::make('weddingBonusPackages')
                            ->relationship('weddingBonusPackages')
                            ->schema([
                                Select::make('bonus_package_id')
                                    ->label('Bonus Package')
                                    ->options(BonusPackage::all()->pluck('name', 'id'))
                                    ->searchable()
                                    ->required(),
                            ]),
                    ]),

                FieldSet::make('Additional Information')
                    ->schema([
                        Select::make('city_id')
                            ->relationship('city', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('wedding_organizer_id')
                            ->relationship('weddingOrganizer', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Toggle::make('is_popular')
                            ->required(),
                    ]),
            ]);
    }
}
