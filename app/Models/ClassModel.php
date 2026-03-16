<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $fillable = [
        'name',
        'image',
        'description',
        'mentor_id'
    ];

    public $timestamps = false;

    // Mentor kelas
    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }

    // Member kelas
    public function members()
    {
        return $this->belongsToMany(User::class, 'class_members', 'class_id', 'user_id');
    }

    // Task dalam kelas
    public function tasks()
    {
        return $this->hasMany(Task::class, 'class_id');
    }
}
