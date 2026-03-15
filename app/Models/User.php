<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
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
        return $this->belongsToMany(ClassModel::class, 'class_members');
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

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isMentor()
    {
        return $this->role === 'mentor';
    }

    public function isMember()
    {
        return $this->role === 'member';
    }

    public function getNameAttribute(): string
    {
        return $this->full_name ?? $this->username;
    }
}
