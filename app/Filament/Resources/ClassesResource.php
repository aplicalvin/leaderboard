<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClassesResource\Pages;
use App\Filament\Resources\ClassesResource\RelationManagers;
use App\Models\ClassModel;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ClassesResource extends Resource
{
    protected static ?string $model = ClassModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Class';
    protected static ?string $modelLabel = 'Class';
    protected static ?string $pluralModelLabel = 'Class';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            TextInput::make('name')
                ->required()
                ->label('Class Name'),

            FileUpload::make('image')
                ->image()
                ->directory('class-images'),

            Textarea::make('description')
                ->columnSpanFull(),

            Select::make('mentor_id')
                ->label('Mentor')
                ->relationship('mentor', 'full_name')
                ->searchable()
                ->preload(),

            // Select::make('members')
            //     ->label('Members')
            //     ->relationship('members', 'full_name')
            //     ->multiple()
            //     ->searchable()
            //     ->preload(),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Image'),

                TextColumn::make('name')
                    ->searchable(),

                TextColumn::make('mentor.full_name')
                    ->label('Mentor')
                    ->searchable(),

                TextColumn::make('members_count')
                    ->counts('members')
                    ->label('Total Members'),
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
          RelationManagers\MembersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClasses::route('/'),
            'create' => Pages\CreateClasses::route('/create'),
            'edit' => Pages\EditClasses::route('/{record}/edit'),
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
