<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $fillable = [
        'lecture_name', 'lecture_duration', 'lecture_content','course_id'
    ];

    public function courses()
    {
        return $this->belongsTo('App\Course', 'course_id');
    }  

    public function assigned_lectures()
    {
        return $this->belongsTo('App\AssignedLecture', 'lecture_id');
    }  

}
