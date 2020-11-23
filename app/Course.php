<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
      
        'course_name',
        'course_level',
        'course_description',
        'course_image'
    ];    

    public function lectures()
    {
        return $this->hasMany('App\Lecture', 'course_id');
    }

    public function assigned_lectures()
    {
        return $this->belongsTo('App\AssignedLecture', 'course_id');
    }  

    
}
