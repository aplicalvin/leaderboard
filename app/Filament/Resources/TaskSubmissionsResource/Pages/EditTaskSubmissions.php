<?php

namespace App\Filament\Resources\TaskSubmissionsResource\Pages;

use App\Filament\Resources\TaskSubmissionsResource;
use App\Models\ScoreLog;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

class EditTaskSubmissions extends EditRecord
{
    protected static string $resource = TaskSubmissionsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        $submission = $this->record;
        $task = $submission->task;

        if ($submission->status === 'approved') {

            ScoreLog::updateOrCreate(
                [
                    'user_id' => $submission->user_id,
                    'source_type' => 'task',
                    'source_id' => $submission->task_id,
                ],
                [
                    'points' => $task->points,
                    'description' => 'Complete task: ' . $task->title,
                ]
            );
        }

        if ($submission->status === 'rejected') {

            ScoreLog::updateOrCreate(
                [
                    'user_id' => $submission->user_id,
                    'source_type' => 'task',
                    'source_id' => $submission->task_id,
                ],
                [
                    'points' => 0,
                    'description' => 'Task rejected: ' . $task->title,
                ]
            );
        }

        $submission->update([
            'reviewed_by' => Auth::id(),
            'reviewed_at' => now(),
        ]);
    }
}