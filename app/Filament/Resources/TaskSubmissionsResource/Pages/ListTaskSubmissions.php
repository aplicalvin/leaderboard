<?php

namespace App\Filament\Resources\TaskSubmissionsResource\Pages;

use App\Filament\Resources\TaskSubmissionsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTaskSubmissions extends ListRecords
{
    protected static string $resource = TaskSubmissionsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
