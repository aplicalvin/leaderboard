<?php

namespace App\Filament\Member\Widgets;

use App\Models\ClassMember;
use App\Models\Task;
use App\Models\ScoreLog;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class MemberStats extends BaseWidget
{
    protected function getCards(): array // Filament v3 menggunakan getStats(), tapi getCards() masih jalan sebagai alias. Saran: ubah ke getStats() jika ini v3 murni.
    {
        $userId = auth()->id();

        $totalClasses = ClassMember::where('user_id', $userId)->count();

        $pendingTasks = Task::whereHas('class.members', function ($q) use ($userId) {
                $q->where('user_id', $userId);
            })
            ->whereDoesntHave('submissions', function ($q) use ($userId) {
                $q->where('user_id', $userId);
            })
            ->count();

        $totalPoints = ScoreLog::where('user_id', $userId)->sum('points');

        return [
            Stat::make('My Classes', $totalClasses)
                ->icon('heroicon-m-academic-cap')
                ->description('Kelas yang sedang diikuti')
                ->descriptionIcon('heroicon-m-academic-cap') // Tambah ikon topi toga
                ->color('primary'),

            Stat::make('Pending Tasks', $pendingTasks)
                ->icon('heroicon-m-clock')
                ->description('Tugas yang belum disubmit')
                ->descriptionIcon('heroicon-m-clock') // Tambah ikon jam/waktu
                ->color('danger'),

            Stat::make('Total Points', $totalPoints)
                ->icon('heroicon-m-trophy')
                ->description('Total point terkumpul')
                ->descriptionIcon('heroicon-m-trophy') // Tambah ikon piala
                ->color('success'),
        ];
    }
}