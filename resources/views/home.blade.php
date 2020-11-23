@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Admin Actions</div>

                <div class="card-body">
              
                    <a href="{{ url('/instructors') }}"  >
                        <button class="btn btn-lg btn-block btn-secondary">
                            <span class="fa fa-arrow-right pull-right"></span> 
                            <span class="pull-left" >  Show Instructors </span> 
                        </button>                       
                    </a>
                    <hr>
                    <a href="{{ url('/courses') }}"  style="text-decoration:none;color:white"> 
                        <button class="btn btn-lg btn-block btn-secondary">
                            <span class="fa fa-arrow-right pull-right"></span> 
                                <span class="pull-left"> Show Courses </span> 
                        </button>
                    </a> 
                    <hr>
                    <a href="{{ url('/lectures') }}"  style="text-decoration:none;color:white"> 
                        <button class="btn btn-lg btn-block btn-secondary">
                            <span class="fa fa-arrow-right pull-right"></span> 
                                <span class="pull-left"> Show Lectures </span> 
                        </button>
                    </a> 
                    <hr>
                    <a href="{{ url('/assignedLectures') }}"  style="text-decoration:none;color:white"> 
                        <button class="btn btn-lg btn-block btn-secondary">
                            <span class="fa fa-arrow-right pull-right"></span> 
                                <span class="pull-left"> Show Assigned Course </span> 
                        </button>
                    </a> 

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
