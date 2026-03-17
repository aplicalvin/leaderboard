<?php

namespace App\Filament\Member\Resources\MemberTaskResource\Pages;

use App\Filament\Member\Resources\MemberTaskResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMemberTasks extends ListRecords
{
    protected static string $resource = MemberTaskResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
