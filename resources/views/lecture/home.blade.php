@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        All Lectures               
                        <a href="{{ route('addLecture') }}" style="">
                            <button class="btn btn-primary pull-right"> 
                                <i class="fa fa-plus" aria-hidden="true"></i> 
                                Add new
                            </button>
                        </a>    
                    </h3>
                </div>

             

                <div class="card-body">

                    @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                            {{ Session::get('flash_message') }}
                        </div>
                    @endif

                    <table class="table table-hover">
                        <thead>
                            <tr>                                
                                <th scope="col" style="width: 200px;">Course Name</th>
                                <th scope="col" style="width: 200px;">Lecture Name</th>
                                <th scope="col" style="width: 200px;">Duration (in minutes)</th>
                                <th scope="col">Content</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($lectures as $lecture)
                                <tr>                                   
                                    <td> {{ $lecture->courses->course_name }} </td>
                                    <td> {{ $lecture->lecture_name }} </td>
                                    <td> {{ $lecture->lecture_duration }} </td>
                                    <td> {{ Str::limit($lecture->lecture_content, 100) }} </td>
                                    <td> 

                                        <a href="{{ route('editLecture', $lecture->id) }}">                                        
                                            <button class="btn btn-sm btn-success"> 
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> 
                                            </button>
                                        </a>  

                                    </td>
                                    <td>

                                        <a href="{{ route('deleteLecture', $lecture->id) }}">
                                            <button class="btn btn-sm btn-danger"> 
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>  
                                        </a>  

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" > No Lectures</td>
                                </tr>
                            @endforelse

                        </tbody>
                       
                    </table>

                    <div class="d-flex justify-content-center">
                        {!! $lectures->links() !!}
                    </div>
             

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
