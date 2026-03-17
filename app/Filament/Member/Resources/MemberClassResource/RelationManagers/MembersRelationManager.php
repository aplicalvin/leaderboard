<?php

namespace App\Filament\Member\Resources\MemberClassResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class MembersRelationManager extends RelationManager
{
    protected static string $relationship = 'members';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('profile_image'),
                Tables\Columns\TextColumn::make('full_name')
                    ->label('Member'),
                Tables\Columns\TextColumn::make('email'),

                Tables\Columns\TextColumn::make('points')
                    ->label('Points')
                    ->getStateUsing(function ($record, $livewire) {

                        $classId = $livewire->ownerRecord->id;

                        $points = \App\Models\ScoreLog::where('user_id', $record->id)
                            ->whereHas('task', function ($q) use ($classId) {
                                $q->where('class_id', $classId);
                            })
                            ->sum('points');

                        return $points ?? 0;
                    })
                    ->color('success')
            ])

            ->headerActions([])
            ->actions([])
            ->bulkActions([]);
    }
}