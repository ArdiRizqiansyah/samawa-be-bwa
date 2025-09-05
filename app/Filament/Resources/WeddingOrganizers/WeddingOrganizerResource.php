<?php

namespace App\Filament\Resources\WeddingOrganizers;

use App\Filament\Resources\WeddingOrganizers\Pages\CreateWeddingOrganizer;
use App\Filament\Resources\WeddingOrganizers\Pages\EditWeddingOrganizer;
use App\Filament\Resources\WeddingOrganizers\Pages\ListWeddingOrganizers;
use App\Filament\Resources\WeddingOrganizers\Pages\ViewWeddingOrganizer;
use App\Filament\Resources\WeddingOrganizers\Schemas\WeddingOrganizerForm;
use App\Filament\Resources\WeddingOrganizers\Schemas\WeddingOrganizerInfolist;
use App\Filament\Resources\WeddingOrganizers\Tables\WeddingOrganizersTable;
use App\Models\WeddingOrganizer;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WeddingOrganizerResource extends Resource
{
    protected static ?string $model = WeddingOrganizer::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'WeddingOrganizer';

    public static function form(Schema $schema): Schema
    {
        return WeddingOrganizerForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return WeddingOrganizerInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WeddingOrganizersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListWeddingOrganizers::route('/'),
            'create' => CreateWeddingOrganizer::route('/create'),
            'view' => ViewWeddingOrganizer::route('/{record}'),
            'edit' => EditWeddingOrganizer::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
