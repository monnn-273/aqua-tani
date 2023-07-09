<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'job_title',
        'job_description',
        'job_category',
        'location',
        'job_type',
        'responsibilities',
        'experience',
        'benefits',
        'vacancy',
        'salary',
        'gender',
        'deadline',
        'job_status',
        'image',
    ];

    // RELATIONSHIP
    public function owner()
    {
        return $this->belongsTo(User::class, 'job_owner_id');
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'job_id');
    }

}
