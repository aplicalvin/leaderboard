<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TaskSubmissionsResource\Pages;
use App\Filament\Resources\TaskSubmissionsResource\RelationManagers;
use App\Models\Task;
use App\Models\TaskSubmission;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TaskSubmissionsResource extends Resource
{
    protected static ?string $model = TaskSubmission::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('task_id')
                    ->label('Task')
                    ->options(Task::pluck('title', 'id'))
                    ->searchable()
                    ->required(),

                Select::make('user_id')
                    ->label('Member')
                    ->options(User::pluck('full_name', 'id'))
                    ->searchable()
                    ->required(),

                TextInput::make('submission_link')
                    ->url()
                    ->required(),

                Textarea::make('submission_note')
                    ->label('Note')
                    ->columnSpanFull(),

                Select::make('status')
                    ->options(function ($record) {

                        if ($record && $record->status !== 'pending') {
                            return [
                                'approved' => 'Approved',
                                'rejected' => 'Rejected',
                            ];
                        }

                        return [
                            'pending' => 'Pending',
                            'approved' => 'Approved',
                            'rejected' => 'Rejected',
                        ];
                    })
                    ->required(),

                DateTimePicker::make('submitted_at')
                    ->label('Submitted At'),

                DateTimePicker::make('reviewed_at')
                    ->label('Reviewed At'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('task.title')
                    ->label('Task')
                    ->searchable(),

                TextColumn::make('user.full_name')
                    ->label('Member')
                    ->searchable(),

                TextColumn::make('submission_link')
                    ->openUrlInNewTab(),

                TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'approved',
                        'danger' => 'rejected',
                    ]),

                TextColumn::make('submitted_at')
                    ->dateTime(),

                TextColumn::make('reviewer.full_name')
                    ->label('Reviewer'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListTaskSubmissions::route('/'),
            'create' => Pages\CreateTaskSubmissions::route('/create'),
            'edit' => Pages\EditTaskSubmissions::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        if (auth()->user()->hasRole('mentor')) {
            $query->where('mentor_id', auth()->id());
        }

        return $query;
    }
}
