<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignedLecture extends Model
{
    protected $fillable = [      
        'instructor_id',
        'course_id',
        'lecture_id',
        'assigned_for_date'
    ];   

    public function instructors()
    {
        return $this->hasMany('App\Instructor', 'id');
    }

    public function courses()
    {
        return $this->hasMany('App\Course', 'id');
    }

    public function lectures()
    {
        return $this->hasMany('App\Lecture', 'id');
    }

  
}
