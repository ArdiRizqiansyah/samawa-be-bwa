<?php

namespace App\Filament\Resources\BookingTransactions\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class BookingTransactionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('booking_trx_id'),
                TextEntry::make('name'),
                TextEntry::make('phone'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('proof'),
                TextEntry::make('total_amount')
                    ->numeric(),
                TextEntry::make('price')
                    ->money(),
                TextEntry::make('total_tax_amout')
                    ->numeric(),
                IconEntry::make('is_paid')
                    ->boolean(),
                TextEntry::make('started_at')
                    ->date(),
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
