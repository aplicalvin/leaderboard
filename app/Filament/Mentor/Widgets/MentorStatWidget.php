<?php

namespace App\Filament\Mentor\Widgets;

use App\Models\ClassModel;
use App\Models\Task;
use App\Models\TaskSubmission;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class MentorStatWidget extends BaseWidget
{
    protected function getStats(): array
    {        
        $mentorId = auth()->id();

        $classes = ClassModel::where('mentor_id', $mentorId);
        return [
            Stat::make(
                'Total Members',
                $classes->withCount('members')->get()->sum('members_count')
            )
                ->description('Member di semua kelas')
                ->icon('heroicon-o-users')
                ->color('success'),

            Stat::make(
                'Total Tasks',
                Task::whereHas('class', function ($q) use ($mentorId) {
                    $q->where('mentor_id', $mentorId);
                })->count()
            )
                ->description('Task di kelas mentor')
                ->icon('heroicon-o-clipboard-document-list')
                ->color('info'),

            Stat::make(
                'Task Submissions',
                TaskSubmission::whereHas('task.class', function ($q) use ($mentorId) {
                    $q->where('mentor_id', $mentorId);
                })->count()
            )
                ->description('Submission dari semua task')
                ->icon('heroicon-o-document-check')
                ->color('warning'),
        ];
    }
}
