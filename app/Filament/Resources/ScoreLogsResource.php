<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScoreLogsResource\Pages;
use App\Filament\Resources\ScoreLogsResource\RelationManagers;
use App\Models\ScoreLog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ScoreLogsResource extends Resource
{
    protected static ?string $model = ScoreLog::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';

    protected static ?int $navigationSort = 6;

    public static function canViewAny(): bool
    {
        $user = auth()->user();

        return $user ? $user->hasRole('admin') : false;
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
                TextColumn::make('user.name')
                    ->label('User')
                    ->searchable(),

                TextColumn::make('task.title')
                    ->label('Task')
                    ->searchable(),

                TextColumn::make('points')
                    ->label('Points')
                    ->sortable(),

                TextColumn::make('description')
                    ->label('Description')
                    ->wrap(),

                TextColumn::make('source_type')
                    ->label('Source'),

                TextColumn::make('source_id')
                    ->label('Source ID'),
            ])
            ->defaultSort('source_id', 'desc')
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([]);
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
            'index' => Pages\ListScoreLogs::route('/'),
            'create' => Pages\CreateScoreLogs::route('/create'),
            'edit' => Pages\EditScoreLogs::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
