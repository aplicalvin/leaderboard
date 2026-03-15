<?php

namespace App\Filament\Resources\ScoreLogsResource\Pages;

use App\Filament\Resources\ScoreLogsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditScoreLogs extends EditRecord
{
    protected static string $resource = ScoreLogsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
