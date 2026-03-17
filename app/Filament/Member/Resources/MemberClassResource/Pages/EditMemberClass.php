<?php

namespace App\Filament\Member\Resources\MemberClassResource\Pages;

use App\Filament\Member\Resources\MemberClassResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMemberClass extends EditRecord
{
    protected static string $resource = MemberClassResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
