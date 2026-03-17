<?php

namespace App\Filament\Member\Resources\MemberTaskResource\Pages;

use App\Filament\Member\Resources\MemberTaskResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMemberTask extends ViewRecord
{
    protected static string $resource = MemberTaskResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
