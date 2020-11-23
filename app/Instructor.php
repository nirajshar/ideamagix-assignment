<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    
    protected $fillable = [
        'instructor_name', 'instructor_description'
    ];    

    public function assigned_lectures()
    {
        return $this->belongsTo('App\AssignedLecture', 'instructor_id');
    }  


}
