<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    protected $guard_name = 'web';
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username',
        'full_name',
        'nim',
        'email',
        'password',
        'profile_image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Mentor memiliki banyak kelas
    public function classes()
    {
        return $this->hasMany(ClassModel::class, 'mentor_id');
    }

    // Member mengikuti banyak kelas
    public function joinedClasses()
    {
        return $this->belongsToMany(ClassModel::class, 'class_members', 'user_id','class_id');
    }

        public function classModels()
    {
        return $this->belongsToMany(ClassModel::class, 'class_members', 'user_id','class_id');
    }

    // Submission tugas
    public function submissions()
    {
        return $this->hasMany(TaskSubmission::class);
    }

    // Score log
    public function scoreLogs()
    {
        return $this->hasMany(ScoreLog::class);
    }

    // Announcement yang dibuat
    public function announcements()
    {
        return $this->hasMany(Announcement::class, 'created_by');
    }

    public function isAdmin(): bool
    {
        return $this->hasRole('admin');
    }

    public function isMentor(): bool
    {
        return $this->hasRole('mentor');
    }

    public function isMember(): bool
    {
        return $this->hasRole('member');
    }

    public function getNameAttribute(): string
    {
        return $this->full_name ?? $this->username;
    }

    public function canAccessPanel(Panel $panel): bool
    {
        if ($panel->getId() === 'admin') {
            return $this->hasRole('admin');
        }

        if ($panel->getId() === 'mentor') {
            return $this->hasRole('mentor');
        }

        return false;
    }
}
