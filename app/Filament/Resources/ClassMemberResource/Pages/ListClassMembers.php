<?php

namespace App\Filament\Resources\ClassMemberResource\Pages;

use App\Filament\Resources\ClassMemberResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClassMembers extends ListRecords
{
    protected static string $resource = ClassMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
