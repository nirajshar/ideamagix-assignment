<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Illuminate\Support\Facades\Validator;
use Session;    
use Response;

class CourseController extends Controller
{
    
    
    public function index()
    {
        $courses = Course::withCount('lectures')->paginate(3);
        // dd($courses);
        return view('course.home')->with('courses',$courses);        
    }

  
    public function create()
    {
        return view('course.create');
    }

   
    public function store(Request $request)
    {
        $rules = [
            'course_name' => 'required|min:3',            
            'course_level' => 'required',
            'course_description' => 'required',
            'course_image' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Response::make(['error' => $validation->errors()], 400);
        }

        if ( $request->hasFile('course_image') ) {
            $file = $request->file('course_image');
            $extension = $file->getClientOriginalExtension(); 
            $fileName = time().'.'.$extension;
            $path = public_path().'/images';
            $upload = $file->move($path,$fileName);        
        }

        $course = new Course;
        $course->course_name = $request->course_name;
        $course->course_level = $request->course_level;
        $course->course_description =  $request->course_description;
        $course->course_image = $fileName;
        $course->save(); 

        Session::flash('flash_message', 'New Course successfully added!');
        return redirect()->back();

    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {

        try {

            $course = Course::findOrFail($id);          
            
            // dd($course);
        } catch(ModelNotFoundException $e) {
            Session::flash('flash_message', 'Course not found!');
            return redirect()->back();           
        }
        
        return view('course.edit')->with('course', $course );
        
    }

  
    public function update(Request $request, $id)
    {
        try {
            $course = Course::findOrFail($id);

            $rules = [
                'course_name' => 'required|min:3',            
                'course_level' => 'required',
                'course_description' => 'required',
                'course_image' => 'required'
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
            if ($validator->fails()) {
                return Response::make(['error' => $validation->errors()], 400);
            }
    
            if ( $request->hasFile('course_image') ) {

                $file = $request->file('course_image');
                $extension = $file->getClientOriginalExtension(); 
                $fileName = time().'.'.$extension;
                $path = public_path().'/images';
                $upload = $file->move($path,$fileName);
            
            }

            // dd($course);
            $course->fill([
                'course_name' => $request->course_name, 
                'course_level' => $request->course_level,
                'course_description' => $request->course_description,
                'course_image' => $fileName
            ]);

            if( $course->isDirty() ){
                $course->save();
                Session::flash('flash_message', 'Course updated successfully!');
                return redirect()->route('courses');         
            } else {
                Session::flash('flash_message', 'Nothing to update!');
                return redirect()->route('courses');    
            }
        } catch(ModelNotFoundException $e) {
            Session::flash('flash_message', 'Course not found!');
            return redirect()->route('courses');
        }
        
        return view('course.edit')->with('course', $course );
    }

   
    public function destroy($id)
    {
        try {

            $course = Course::findOrFail($id);        
            
            if ( $course === null ) {
                Session::flash('flash_message', 'Course not found!');
                return redirect()->back();      
            } else {

                $course->delete();
                Session::flash('flash_message', 'Course deleted successfully!');
                return redirect()->back();   
                
            }
            
            // dd($course);
        } catch(ModelNotFoundException $e) {
            Session::flash('flash_message', 'Course not found!');
            return redirect()->back();           
        }
        
        return view('course.edit')->with('course', $course );
    }
}
