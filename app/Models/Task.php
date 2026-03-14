<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'title',
        'description',
        'points',
        'deadline'
    ];

    public $timestamps = false;

    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }

    public function submissions()
    {
        return $this->hasMany(TaskSubmission::class);
    }
}
