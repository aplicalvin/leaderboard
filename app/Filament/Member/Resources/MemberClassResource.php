<?php

namespace App\Filament\Member\Resources;

use App\Filament\Member\Resources\MemberClassResource\Pages;
use App\Filament\Member\Resources\MemberClassResource\RelationManagers;
use App\Models\ClassModel;
use App\Models\MemberClass;
use Filament\Forms;
use Filament\Infolists\Components\Section;
use Filament\Forms\Form;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MemberClassResource extends Resource
{
    protected static ?string $model = ClassModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-group';
    protected static ?string $navigationLabel = 'My Classes';

    public static function canCreate(): bool
    {
        return false;
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),

                TextColumn::make('name'),

                TextColumn::make('mentor.full_name')
                    ->label('Mentor'),

                TextColumn::make('members_count')
                    ->counts('members')
                    ->label('Total Members'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Class Info')
                    ->schema([
                        ImageEntry::make('image'),

                        TextEntry::make('name'),

                        TextEntry::make('mentor.full_name'),

                        TextEntry::make('description'),
                    ])
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\MembersRelationManager::class,
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $user = auth()->user();

        return parent::getEloquentQuery()
            ->whereHas('members', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            });
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMemberClasses::route('/'),
            // 'create' => Pages\CreateMemberClass::route('/create'),
            // 'edit' => Pages\EditMemberClass::route('/{record}/edit'),
            'view' => Pages\ViewMemberClass::route('/{record}'),
        ];
    }
}
