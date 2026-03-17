<?php

namespace App\Policies;

use App\Models\TaskSubmission;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TaskSubmissionPolicy
{
    public function before(User $user)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole(['mentor','member']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, TaskSubmission $taskSubmission): bool
    {
        // Mentor
        if ($user->hasRole('mentor')) {
            return $taskSubmission->task->class->mentor_id === $user->id;
        }

        // Member
        if ($user->hasRole('member')) {
            return $taskSubmission->user_id === $user->id;
        }

        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole('member');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, TaskSubmission $taskSubmission): bool
    {
        // Mentor (review)
        if ($user->hasRole('mentor')) {
            return $taskSubmission->task->class->mentor_id === $user->id;
        }

        // Member (edit sendiri)
        if ($user->hasRole('member')) {
            return $taskSubmission->user_id === $user->id;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, TaskSubmission $taskSubmission): bool
    {
        if ($user->hasRole('member')) {
            return $taskSubmission->user_id === $user->id;
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, TaskSubmission $taskSubmission): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, TaskSubmission $taskSubmission): bool
    {
        return false;
    }
}
