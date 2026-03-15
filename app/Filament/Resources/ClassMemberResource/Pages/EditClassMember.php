<?php

namespace App\Filament\Resources\ClassMemberResource\Pages;

use App\Filament\Resources\ClassMemberResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClassMember extends EditRecord
{
    protected static string $resource = ClassMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
