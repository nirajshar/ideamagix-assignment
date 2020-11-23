@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Course') }}</div>

                @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        {{ Session::get('flash_message') }}
                    </div>
                @endif

                

                <div class="card-body">
                    <form method="POST" action="{{ route('createCourse') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="course_name" class="col-md-4 col-form-label text-md-right">{{ __('Course Name') }}</label>

                            <div class="col-md-6">
                                <input id="course_name" type="text" class="form-control @error('course_name') is-invalid @enderror" name="course_name" value="{{ old('course_name') }}" required autocomplete="course_name" autofocus>

                                @error('course_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="course_level" class="col-md-4 col-form-label text-md-right">{{ __('Course Level') }}</label>

                            <div class="col-md-6">

                                <select id="course_level" class="form-control @error('course_level') is-invalid @enderror"  name="course_level" value="{{ old('course_level') }}" required autocomplete="course_level" >
                                    <option disabled selected>-- Select Level --</option>                                    
                                    <option value="easy">Easy</option>
                                    <option value="medium">Medium</option>
                                    <option value="hard">Hard</option>                                   
                                </select>
                              
                                @error('course_level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="course_description" class="col-md-4 col-form-label text-md-right">{{ __('Course Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="course_description" class="form-control @error('course_description') is-invalid @enderror" name="course_description" value="{{ old('course_description') }}" required autocomplete="course_description" style="resize: none;"  rows="4" ></textarea>

                                @error('course_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                        

                        <div class="form-group row">
                            <label for="course_image" class="col-md-4 col-form-label text-md-right">{{ __('Course Image') }}</label>

                            <div class="col-md-6">
                                
                                <input id="course_image" type="file" class="form-control @error('course_image') is-invalid @enderror" name="course_image" value="{{ old('course_image') }}" required autocomplete="course_image" >

                                @error('course_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
