<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Spatie\Permission\Models\Role;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?int $navigationSort = 1;

    public static function canViewAny(): bool
    {
        return auth()->user()?->hasRole('admin');
    }
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('username')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                TextInput::make('full_name')
                    ->label('Full Name')
                    ->required(),

                TextInput::make('nim')
                    ->label('NIM')
                    ->nullable(),

                TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true),

                TextInput::make('password')
                    ->password()
                    ->required(fn ($record) => $record === null)
                    ->dehydrated(fn ($state) => filled($state)),

                FileUpload::make('profile_image')
                    ->image()
                    ->directory('profile'),

                Select::make('roles')
                    ->label('Role')
                    ->relationship('roles', 'name')
                    ->options(Role::pluck('name', 'name'))
                    ->required()
                    ->preload()
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('username')
                    ->searchable(),

                TextColumn::make('full_name')
                    ->searchable(),

                TextColumn::make('nim'),

                TextColumn::make('email')
                    ->searchable(),

                TextColumn::make('roles.name')
                    ->badge()
                    ->label('Role')
                    ->color(fn ($state) => match ($state) {
                        'admin' => 'danger',
                        'mentor' => 'warning',
                        'member' => 'success',
                        default => 'gray',
                    }),
            ])
            ->filters([
                SelectFilter::make('role')
                    ->label('Filter Role')
                    ->options(Role::pluck('name', 'name'))
                    ->query(function ($query, array $data) {
                        if ($data['value']) {
                            $query->role($data['value']);
                        }
                    })
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
