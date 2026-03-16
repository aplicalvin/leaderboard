<?php

namespace App\Filament\Resources\ClassesResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MembersRelationManager extends RelationManager
{
    protected static string $relationship = 'members';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
            // Forms\Components\Select::make('user_id')
            //     ->label("Member")
            //     ->relationship('user', 'full_name')
            //     ->searchable()
            //     ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('full_name')
            ->columns([
                ImageColumn::make('profile_image'),
                Tables\Columns\TextColumn::make('full_name')
                    ->label('Member'),
                Tables\Columns\TextColumn::make('email'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make()
                    ->label('Add Member')
                    ->recordSelectOptionsQuery(function ($query) {
                        $query->whereHas('roles', function ($q) {
                            $q->whereIn('name', ['member', 'mentor']);
                        });
                    })
                    ->preloadRecordSelect()
            ])
            ->actions([
                Tables\Actions\DetachAction::make()->label('Delete Member')
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
