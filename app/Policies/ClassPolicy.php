<?php

namespace App\Policies;

use App\Models\ClassModel;
use App\Models\User;

class ClassPolicy
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
     * Mentor bisa melihat daftar class
     */
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['mentor', 'member']);
    }

    /**
     * Mentor hanya bisa melihat class yang dia ampu
     */
    public function view(User $user, ClassModel $classModel): bool
    {
        // Mentor: hanya class miliknya
        if ($user->hasRole('mentor')) {
            return $classModel->mentor_id === $user->id;
        }

        // Member: hanya class yang dia join
        if ($user->hasRole('member')) {
            return $classModel->members()->where('user_id', $user->id)->exists();
        }

        return false;
    }

    /**
     * Hanya admin yang bisa membuat class
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Mentor bisa update class yang dia ampu
     */
    public function update(User $user, ClassModel $classModel): bool
    {
        return $classModel->mentor_id === $user->id;
    }

    /**
     * Hanya admin yang boleh delete
     */
    public function delete(User $user, ClassModel $classModel): bool
    {
        return false;
    }

    public function restore(User $user, ClassModel $classModel): bool
    {
        return false;
    }

    public function forceDelete(User $user, ClassModel $classModel): bool
    {
        return false;
    }
}