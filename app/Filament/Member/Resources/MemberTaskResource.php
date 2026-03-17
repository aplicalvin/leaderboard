<?php

namespace App\Filament\Member\Resources;

use App\Filament\Member\Resources\MemberTaskResource\RelationManagers;

use App\Filament\Member\Resources\MemberTaskResource\Pages;
use App\Models\Task;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Infolist;

class MemberTaskResource extends Resource
{
    protected static ?string $model = Task::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationLabel = 'My Tasks';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),

                TextColumn::make('class.name')
                    ->label('Class'),

                TextColumn::make('points'),

                TextColumn::make('deadline')
                    ->dateTime(),
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
                Section::make('Task Detail')
                    ->schema([
                        TextEntry::make('title'),

                        TextEntry::make('class.name')
                            ->label('Class'),

                        TextEntry::make('description'),

                        TextEntry::make('points'),

                        TextEntry::make('deadline')
                            ->dateTime(),
                    ])
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\SubmissionsRelationManager::class,
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $user = auth()->user();

        return parent::getEloquentQuery()
            ->whereHas('class.members', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            });
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMemberTasks::route('/'),
            'view' => Pages\ViewMemberTask::route('/{record}'),
        ];
    }
}
