<?php

namespace App\Filament\Member\Resources\MemberTaskResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class SubmissionsRelationManager extends RelationManager
{
    protected static string $relationship = 'submissions';

    public function isReadOnly(): bool
    {
        return false;
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('submission_link')
                ->label('Link Submission')
                ->url()
                ->required(),

            Forms\Components\Textarea::make('submission_note')
                ->label('Catatan')
                ->rows(4),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('submission_link')
                    ->label('Link')
                    ->url(fn ($state) => $state)
                    ->openUrlInNewTab(),

                TextColumn::make('submission_note')
                    ->limit(30),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'approved' => 'success',
                        'rejected' => 'danger',
                        default => 'warning',
                    }),

                TextColumn::make('submitted_at')
                    ->dateTime(),
            ])
        ->headerActions([
            Tables\Actions\CreateAction::make()
                ->mutateFormDataUsing(function (array $data) {
                    $data['user_id'] = auth()->id();
                    $data['submitted_at'] = now();
                    $data['status'] = 'pending';
                    
                    // CATATAN: Kamu tidak perlu mengisi 'task_id' secara manual.
                    // Karena ini adalah Relation Manager ('submissions'), Filament akan 
                    // otomatis menyambungkan foreign key ke parent (Task) tersebut!
                    
                    return $data;
                })
                ->visible(function (RelationManager $livewire) {
                    $taskId = $livewire->getOwnerRecord()->id;
                    
                    return !\App\Models\TaskSubmission::where('task_id', $taskId)
                        ->where('user_id', auth()->id())
                        ->exists();
                })
        ])
        ->actions([
                Tables\Actions\EditAction::make()
                    ->visible(fn ($record) =>
                        $record->user_id === auth()->id() &&
                        $record->status === 'pending'
                    ),
               Tables\Actions\DeleteAction::make()
                    ->visible(fn ($record) =>
                        $record->user_id === auth()->id() &&
                        $record->status === 'pending'
                    )
        ])->modifyQueryUsing(function ($query) {
            $query->where('user_id', auth()->id());
        });
    }
}