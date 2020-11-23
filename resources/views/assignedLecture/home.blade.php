@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h3>
                        All Assigned Lectures                       
                    </h3>
                </div>

             

                <div class="card-body">

                    <form method="POST" action="{{ route('assignLecture') }}" >
                        @csrf

                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">

                                        <div class="col-md-3">

                                            <select id="course_id" class="form-control"  name="course_id" value="{{ old('course_id') }}" required autocomplete="course_id" >
                                                <option disabled selected>-- Select Course --</option>
                                                @forelse($allCourses as $course)

                                                    <option value="{{ $course->id }}">{{ $course->course_name }}</option>

                                                @empty
                                                    <option> No Courses</option>
                                                @endforelse                                                                             
                                            </select>

                                        </div>     

                                        <div class="col-md-3">

                                            <select id="lecture_id" class="form-control"  name="lecture_id" value="{{ old('lecture_id') }}" required autocomplete="lecture_id" >
                                                <option disabled selected>-- Select Lecture --</option>
                                                @forelse($allLectures as $lecture)

                                                    <option value="{{ $lecture->id }}">{{ $lecture->lecture_name }}</option>

                                                @empty
                                                    <option> No Lectures</option>
                                                @endforelse                                                                             
                                            </select>

                                        </div>   

                                        <div class="col-md-3">

                                            <input class="form-control" type="date" placeholder="2011-08-19T13:45:00" id="lecture_date" name="lecture_date">

                                        </div>   

                                        <div class="col-md-3">

                                            <select id="instructor_id" class="form-control"  name="instructor_id" value="{{ old('instructor_id') }}" required autocomplete="instructor_id" >
                                                <option disabled selected>-- Select Instructor --</option>
                                                                                                                        
                                            </select>

                                        </div>   

                                    </div>   

                                    <hr>

                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                       
                                            <button type="submit" class="btn btn-primary btn-lg btn-block" id="check-instructor">
                                                {{ __('Assign Lecture') }}                                                
                                            </button>

                                        </div>      

                                    </div>                                               
                                </div>                        
                            </div>                      
                        </div>

                    </form>


                    <hr>
                    <hr>

                    @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                            {{ Session::get('flash_message') }}
                        </div>
                    @endif

                    <table class="table table-hover">
                        <thead>
                            <tr>                                
                                <th scope="col" >Instructor ID</th>
                                <th scope="col" >Course ID</th>
                                <th scope="col" >Lecture ID</th>
                                <th scope="col">Assigned Date</th>                               
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($assignedLectures as $lecture)
                                <tr>                                   
                                    <td> {{ $lecture->instructors[0]->instructor_name }} </td>
                                    <td> {{ $lecture->courses[0]->course_name }} </td>
                                    <td> {{ $lecture->lectures[0]->lecture_name }} </td>
                                    <td> {{ $lecture->assigned_for_date }} </td>                                    
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" > No Assigned Lectures</td>
                                </tr>
                            @endforelse

                        </tbody>
                       
                    </table>

                    <div class="d-flex justify-content-center">
                        {!! $assignedLectures->links() !!}
                    </div>
             

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
