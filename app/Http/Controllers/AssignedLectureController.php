<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssignedLecture;
use App\Course;
use App\Instructor;
use App\Lecture;
use DB;
use Response;
use Illuminate\Support\Facades\Validator;
use Session;

class AssignedLectureController extends Controller
{
    
    public function index()
    {
        $assignedLectures = AssignedLecture::with('courses', 'lectures', 'instructors')->paginate(3);
        // dd($assignedLectures);
        $allCourses =  Course::get(['id','course_name']);
        // dd($allCourses);
        $allInstructors = Instructor::get(['id', 'instructor_name']);
        $allLectures = Lecture::get(['id', 'lecture_name']);
        return view('assignedLecture.home')
                    ->with('assignedLectures', $assignedLectures)
                    ->with('allCourses', $allCourses)
                    // ->with('allInstructors', $allInstructors )
                    ->with('allLectures', $allLectures );                
        
    }

    public function getinstructor(Request $request)
    {
        
        
        $instructorsNotAssigned = \DB::table('instructors')
                                    ->leftjoin('assigned_lectures', 'instructors.id', '=', 'assigned_lectures.instructor_id')
                                    ->whereNotIn('instructors.id', 
                                        \DB::table('assigned_lectures')->where('assigned_for_date','=',$request->input('lecture_date'))
                                        ->pluck('instructor_id')
                                    )
                                    ->select(['instructors.id','instructors.instructor_name'])
                                    ->get();
        
        // dd($instructorsNotAssigned);
        
        return response()->json(['success' => true, 'instructorsNotAssigned' => $instructorsNotAssigned]);
    }

  
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'course_id' => 'required',            
            'lecture_id' => 'required',
            'instructor_id' => 'required',
            'lecture_date' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Response::make(['error' => $validation->errors()], 400);
        }

        $assignLecture = new AssignedLecture;
        $assignLecture->course_id = $request->course_id;
        $assignLecture->lecture_id = $request->lecture_id;
        $assignLecture->instructor_id =  $request->instructor_id;
        $assignLecture->assigned_for_date = $request->lecture_date;
        $assignLecture->save(); 

        Session::flash('flash_message', 'Lecture assigned successfully !');
        return redirect()->back();


    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
