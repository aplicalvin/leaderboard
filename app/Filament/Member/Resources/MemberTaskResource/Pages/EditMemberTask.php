<?php

namespace App\Filament\Member\Resources\MemberTaskResource\Pages;

use App\Filament\Member\Resources\MemberTaskResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMemberTask extends EditRecord
{
    protected static string $resource = MemberTaskResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
