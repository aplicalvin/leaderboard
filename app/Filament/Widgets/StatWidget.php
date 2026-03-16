<?php

namespace App\Filament\Widgets;

use App\Models\ClassModel;
use App\Models\TaskSubmission;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count())
                ->description('Jumlah semua user')
                ->icon('heroicon-o-users'),

            Stat::make('Total Classes', ClassModel::count())
                ->description('Jumlah semua kelas')
                ->icon('heroicon-o-rectangle-group'),

            Stat::make('Task Submissions', TaskSubmission::count())
                ->description('Jumlah submission task')
                ->icon('heroicon-o-document-check'),
        ];
    }
}
