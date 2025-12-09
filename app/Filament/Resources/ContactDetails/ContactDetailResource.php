<?php

namespace App\Filament\Resources\ContactDetails;

use App\Filament\Resources\ContactDetails\Pages\CreateContactDetail;
use App\Filament\Resources\ContactDetails\Pages\EditContactDetail;
use App\Filament\Resources\ContactDetails\Pages\ListContactDetails;
use App\Filament\Resources\ContactDetails\Schemas\ContactDetailForm;
use App\Filament\Resources\ContactDetails\Tables\ContactDetailsTable;
use App\Models\ContactDetail;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ContactDetailResource extends Resource
{
    protected static ?string $model = ContactDetail::class;

    protected static ?int $navigationSort = 1; 
    protected static string|UnitEnum|null $navigationGroup = 'Contact';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ContactDetailForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ContactDetailsTable::configure($table);
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
            'index' => ListContactDetails::route('/'),
            'create' => CreateContactDetail::route('/create'),
            'edit' => EditContactDetail::route('/{record}/edit'),
        ];
    }
}
