@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

            
               

                <div class="card-header"><h3>
                        All Courses       

                        <a href="{{ route('addCourse') }}">
                            <button class="btn btn-primary pull-right"> 
                                <i class="fa fa-plus" aria-hidden="true"></i> 
                                Add new
                            </button>   
                        </a>  
                    </h3>
                </div>

                <div class="card-body">

                    @if(Session::has('flash_message'))
                        <div class="alert alert-info">
                            {{ Session::get('flash_message') }}
                        </div>
                    @endif

                    <table class="table table-hover">
                        <thead>
                            <tr>                     
                                <th></th>           
                                <th scope="col">Course Name</th>
                                <th scope="col">Difficulty</th>
                                <th scope="col">Lectures</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($courses as $course)
                                <tr>                                   
                                    <td> <img src="{{ asset('images/'.$course->course_image) }}" height="30px" width="30px" /> </td>
                                    <td> {{ $course->course_name }} </td>
                                    <td> {{ ucfirst( $course->course_level ) }} </td>
                                    <td> {{ $course->lectures_count }} </td>
                                    <td> 
                                        <a href="{{ route('editCourse', $course->id) }}">
                                            <button class="btn btn-sm btn-success"> 
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> 
                                            </button>
                                        </a>  
                                    </td>
                                    <td>
                                        <a href="{{ route('deleteCourse', $course->id) }}">
                                            <button class="btn btn-sm btn-danger"> 
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>     
                                        </a>  

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" > No course</td>
                                </tr>
                            @endforelse

                        </tbody>
                       
                    </table>

                    <div class="d-flex justify-content-center">
                        {!! $courses->links() !!}
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
