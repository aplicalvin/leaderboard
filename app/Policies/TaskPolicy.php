<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;

class TaskPolicy
{
    /**
     * Admin memiliki akses penuh
     */
    public function before(User $user, string $ability)
    {
        if ($user->hasRole('admin')) {
            return true;
        }
    }

    /**
     * Mentor bisa melihat daftar task
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole('mentor');
    }

    /**
     * Mentor hanya bisa melihat task di class yang dia ampu
     */
    public function view(User $user, Task $task): bool
    {
        return $user->hasRole('mentor')
            && $task->class->mentor_id === $user->id;
    }

    /**
     * Mentor bisa membuat task
     */
    public function create(User $user): bool
    {
        return $user->hasRole('mentor');
    }

    /**
     * Mentor hanya bisa update task di class miliknya
     */
    public function update(User $user, Task $task): bool
    {
        return $user->hasRole('mentor')
            && $task->class->mentor_id === $user->id;
    }

    /**
     * Mentor hanya bisa delete task di class miliknya
     */
    public function delete(User $user, Task $task): bool
    {
        return $user->hasRole('mentor')
            && $task->class->mentor_id === $user->id;
    }

    public function restore(User $user, Task $task): bool
    {
        return false;
    }

    public function forceDelete(User $user, Task $task): bool
    {
        return false;
    }
}