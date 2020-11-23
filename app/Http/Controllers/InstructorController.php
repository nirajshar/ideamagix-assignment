<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instructor;
use Illuminate\Support\Facades\Validator;
use Session;    
use Response;

class InstructorController extends Controller
{
   
    public function index()
    {
        $instructors = Instructor::paginate(3);
        // dd($instructors);
        return view('instructor.home')->with('instructors', $instructors);                
    }

    
    public function create()
    {
        return view('instructor.create');
        
    }

  
    public function store(Request $request)
    {
        $rules = [
            'instructor_name' => 'required|min:3',            
            'instructor_description' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Response::make(['error' => $validation->errors()], 400);
        }

        $instructor = new Instructor;
        $instructor->instructor_name = $request->instructor_name;       
        $instructor->instructor_description =  $request->instructor_description;
        $instructor->save(); 

        Session::flash('flash_message', 'New Instructor successfully added!');
        return redirect()->route('instructors'); 
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        try {

            $instructor = Instructor::findOrFail($id);          
            
            // dd($instructor);
        } catch(ModelNotFoundException $e) {
            Session::flash('flash_message', 'Instructor not found!');
            return redirect()->back();           
        }
        
        return view('instructor.edit')->with('instructor', $instructor );
    }

   
    public function update(Request $request, $id)
    {
        
        try {

            $instructor = Instructor::findOrFail($id);

            $rules = [
                'instructor_name' => 'required|min:3',            
                'instructor_description' => 'required'
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
            if ($validator->fails()) {
                return Response::make(['error' => $validation->errors()], 400);
            }           

            // dd($instructor);
            $instructor->fill([
                'instructor_name' => $request->instructor_name, 
                'instructor_description' => $request->instructor_description
            ]);

            if( $instructor->isDirty() ){
                $instructor->save();
                Session::flash('flash_message', 'Instructor updated successfully!');
                return redirect()->route('instructors');         
            } else {
                Session::flash('flash_message', 'Nothing to update!');
                return redirect()->route('instructors');    
            }
        } catch(ModelNotFoundException $e) {
            Session::flash('flash_message', 'Instructor not found!');
            return redirect()->route('instructors');
        }       
       
    }

   
    public function destroy($id)
    {
        try {

            $instructor = Instructor::findOrFail($id);        
            
            if ( $instructor === null ) {
                Session::flash('flash_message', 'Instructor not found!');
                return redirect()->back();      
            } else {

                $instructor->delete();
                Session::flash('flash_message', 'Instructor deleted successfully!');
                return redirect()->back();   
                
            }
            
            // dd($instructor);
        } catch(ModelNotFoundException $e) {
            Session::flash('flash_message', 'Instructor not found!');
            return redirect()->back();           
        }       
       
    }
}
