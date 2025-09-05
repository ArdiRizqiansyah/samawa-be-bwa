<?php

namespace App\Filament\Resources\BookingTransactions\Schemas;

use Filament\Schemas\Schema;
use App\Models\WeddingPackage;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;

class BookingTransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Wizard::make([
                    Step::make('Product and Price')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('wedding_package_id')
                                    ->relationship('weddingPackage', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->live()
                                    ->afterStateUpdated(function ($state, callable $set) {
                                        $weddingPackage = WeddingPackage::find($state);
                                        $price = $weddingPackage ? $weddingPackage->price : 0;

                                        $set('price', $price);

                                        $tax = 0.11;
                                        $totalTaxAmount = $price * $tax;

                                        $totalAmount = $totalTaxAmount + $price;
                                        $set('total_amount', number_format($totalAmount, 0, '', ''));
                                        $set('total_tax_amount', number_format($totalTaxAmount, 0, '', ''));
                                    }),
                                TextInput::make('price')
                                    ->required()
                                    ->numeric()
                                    ->readOnly()
                                    ->prefix('IDR'),
                                TextInput::make('total_amount')
                                    ->required()
                                    ->numeric()
                                    ->readOnly()
                                    ->prefix('IDR'),
                                TextInput::make('total_tax_amount')
                                    ->required()
                                    ->numeric()
                                    ->readOnly()
                                    ->prefix('IDR'),
                                DatePicker::make('started_at')
                                    ->required(),
                            ])
                    ]),

                    Step::make('Customer Information')
                        ->schema([
                            Grid::make(2)
                                ->schema([
                                    TextInput::make('name')
                                        ->required()
                                        ->maxLength(255),
                                    TextInput::make('email')
                                        ->required()
                                        ->email()
                                        ->maxLength(255),
                                    TextInput::make('phone')
                                        ->required()
                                        ->maxLength(255),
                            ])
                    ]),

                    Step::make('Payment Information')
                        ->schema([
                            Grid::make(1)
                                ->schema([
                                    TextInput::make('booking_trx_id')
                                        ->required()
                                        ->maxLength(255),
                                    ToggleButtons::make('is_paid')
                                        ->label('Apakah sudah membayar?')
                                        ->boolean()
                                        ->grouped()
                                        ->icons([
                                            true => 'heroicon-o-pencil',
                                            false => 'heroicon-o-clock',
                                        ])
                                        ->required(),
                                    FileUpload::make('proof')
                                        ->image()
                                        ->required(),
                            ])
                    ]),
                ])
                ->columnSpanFull()
                ->skippable(),
            ]);
    }
}
