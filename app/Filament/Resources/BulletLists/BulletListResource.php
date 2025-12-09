<?php

namespace App\Filament\Resources\BulletLists;

use App\Filament\Resources\BulletLists\Pages\CreateBulletList;
use App\Filament\Resources\BulletLists\Pages\EditBulletList;
use App\Filament\Resources\BulletLists\Pages\ListBulletLists;
use App\Filament\Resources\BulletLists\Schemas\BulletListForm;
use App\Filament\Resources\BulletLists\Tables\BulletListsTable;
use App\Models\BulletList;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class BulletListResource extends Resource
{
    protected static ?string $model = BulletList::class;

    protected static ?int $navigationSort = 8; 
    protected static string|UnitEnum|null $navigationGroup = 'Home';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return BulletListForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BulletListsTable::configure($table);
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
            'index' => ListBulletLists::route('/'),
            'create' => CreateBulletList::route('/create'),
            'edit' => EditBulletList::route('/{record}/edit'),
        ];
    }
}
