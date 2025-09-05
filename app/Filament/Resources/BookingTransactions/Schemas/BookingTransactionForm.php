<?php

namespace App\Filament\Resources\BookingTransactions\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BookingTransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('booking_trx_id')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('proof')
                    ->required(),
                TextInput::make('total_amount')
                    ->required()
                    ->numeric(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                TextInput::make('total_tax_amout')
                    ->required()
                    ->numeric(),
                Toggle::make('is_paid')
                    ->required(),
                DatePicker::make('started_at')
                    ->required(),
                Select::make('wedding_package_id')
                    ->relationship('weddingPackage', 'name')
                    ->required(),
            ]);
    }
}
