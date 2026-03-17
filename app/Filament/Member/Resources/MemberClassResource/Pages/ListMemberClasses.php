<?php

namespace App\Filament\Member\Resources\MemberClassResource\Pages;

use App\Filament\Member\Resources\MemberClassResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMemberClasses extends ListRecords
{
    protected static string $resource = MemberClassResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
