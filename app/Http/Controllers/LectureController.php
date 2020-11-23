<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lecture;
use Illuminate\Support\Facades\Validator;
use Session;   
use App\Course; 
use Response;


class LectureController extends Controller
{
    public function index()
    {
        $lectures = Lecture::with('courses')->paginate(3);
        // $lectures->setRelation('courses', $lectures->course()->paginate(10));
        // dd($lectures);
        return view('lecture.home')->with('lectures', $lectures);                
    }

    
    public function create()
    {
        $courses = Course::all();
        // dd($courses);
        return view('lecture.create')->with('courses', $courses);        
    }

    public function store(Request $request)
    {
        $rules = [
            'lecture_name' => 'required|min:3',            
            'lecture_duration' => 'required|numeric',            
            'course_id' => 'required|numeric',            
            'lecture_content' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Response::make(['error' => $validation->errors()], 400);
        }

        $lecture = new Lecture;
        $lecture->lecture_name = $request->lecture_name;       
        $lecture->lecture_duration = $request->lecture_duration;       
        $lecture->course_id = $request->course_id;       
        $lecture->lecture_content =  $request->lecture_content;
        $lecture->save(); 

        Session::flash('flash_message', 'New Lecture successfully added!');
        return redirect()->route('lectures'); 
    }


    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        try {

            $lecture = Lecture::with('courses')->findOrFail($id);          
            
            // dd($lecture);
        } catch(ModelNotFoundException $e) {
            Session::flash('flash_message', 'Lecture not found!');
            return redirect()->back();           
        }
        
        return view('lecture.edit')->with('lecture', $lecture );
    }


    public function update(Request $request, $id)
    {
        // dd($request->all());
        
        try {

            $lecture = Lecture::findOrFail($id);

            $rules = [
                'lecture_name' => 'required|min:3',            
                'lecture_duration' => 'required|numeric',            
                'course_id' => 'required|numeric',            
                'lecture_content' => 'required'
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
            if ($validator->fails()) {
                return Response::make(['error' => $validation->errors()], 400);
            }           

            // dd($lecture);
            $lecture->fill([
                'lecture_name' => $request->lecture_name, 
                'lecture_duration' => $request->lecture_duration,      
                'course_id' => $request->course_id,
                'lecture_content' => $request->lecture_content
            ]);

            if( $lecture->isDirty() ){
                $lecture->save();
                Session::flash('flash_message', 'Lecture updated successfully!');
                return redirect()->route('lectures');         
            } else {
                Session::flash('flash_message', 'Nothing to update!');
                return redirect()->route('lectures');    
            }
        } catch(ModelNotFoundException $e) {
            Session::flash('flash_message', 'Lecture not found!');
            return redirect()->route('lectures');
        }       

    }

   
    public function destroy($id)
    {
        try {

            $lecture = Lecture::findOrFail($id);        
            
            if ( $lecture === null ) {
                Session::flash('flash_message', 'Lecture not found!');
                return redirect()->back();      
            } else {

                $lecture->delete();
                Session::flash('flash_message', 'Lecture deleted successfully!');
                return redirect()->back();   
                
            }
            
            // dd($lecture);
        } catch(ModelNotFoundException $e) {
            Session::flash('flash_message', 'Lecture not found!');
            return redirect()->back();           
        }
       
    }

}
