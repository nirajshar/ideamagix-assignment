@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Lecture') }}</div>
                            

                <div class="card-body">
                    <form method="POST" action="{{ route('createLecture') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="lecture_name" class="col-md-4 col-form-label text-md-right">{{ __('Lecture Name') }}</label>

                            <div class="col-md-6">
                                <input id="lecture_name" type="text" class="form-control @error('lecture_name') is-invalid @enderror" name="lecture_name" value="{{ old('lecture_name') }}" required autocomplete="lecture_name" autofocus>

                                @error('lecture_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lecture_duration" class="col-md-4 col-form-label text-md-right">{{ __('Lecture Duration (in minutes)') }}</label>

                            <div class="col-md-6">
                                <input id="lecture_duration" type="text" class="form-control @error('lecture_duration') is-invalid @enderror" name="lecture_duration" value="{{ old('lecture_duration') }}" required autocomplete="lecture_duration" autofocus>

                                @error('lecture_duration')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>        

                        <div class="form-group row">
                            <label for="lecture_content" class="col-md-4 col-form-label text-md-right">{{ __('Lecture Content') }}</label>

                            <div class="col-md-6">
                                <textarea id="lecture_content" class="form-control @error('lecture_content') is-invalid @enderror" name="lecture_content" required style="resize: none;"  rows="4" >{{ old('lecture_content') }}</textarea>

                                @error('lecture_content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>      

                        <div class="form-group row">
                            <label for="course_id" class="col-md-4 col-form-label text-md-right">{{ __('Course Name') }}</label>

                            <div class="col-md-6">
                                
                                <select id="course_id" class="form-control @error('course_level') is-invalid @enderror"  name="course_id" required >
                                    <option disabled selected>-- Select Course Name --</option>                                    
                                    @forelse ( $courses as $course )
                                        <option value="{{ $course->id }}"> {{ $course->course_name }}</option>                                    
                                    @empty
                                        <option >-- No Courses Yet ! --</option>
                                    @endforelse
                    
                                </select>

                                @error('course_name')
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
