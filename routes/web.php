<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    # Common Routes
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/assigned-course', 'AssignedcourseController@index')->name('assignedCourse');

    # Instructor Routes
    Route::get('/instructors', 'InstructorController@index')->name('instructors');
    Route::get('/instructors/add', 'InstructorController@create')->name('addInstructor');
    Route::post('/instructors/add', 'InstructorController@store')->name('createInstructor');
    Route::get('/instructors/edit/{id}', 'InstructorController@edit')->name('editInstructor');
    Route::post('/instructors/edit/{id}', 'InstructorController@update')->name('updateInstructor');
    Route::get('/instructors/delete/{id}', 'InstructorController@destroy')->name('deleteInstructor');

    # Course Routes
    Route::get('/courses', 'CourseController@index')->name('courses');
    Route::get('/courses/add', 'CourseController@create')->name('addCourse');
    Route::post('/courses/add', 'CourseController@store')->name('createCourse');
    Route::get('/courses/edit/{id}', 'CourseController@edit')->name('editCourse');
    Route::post('/courses/edit/{id}', 'CourseController@update')->name('updateCourse');
    Route::get('/courses/delete/{id}', 'CourseController@destroy')->name('deleteCourse');

    # Lecture Routes
    Route::get('/lectures', 'LectureController@index')->name('lectures');
    Route::get('/lectures/add', 'LectureController@create')->name('addLecture');
    Route::post('/lectures/add', 'LectureController@store')->name('createLecture');
    Route::get('/lectures/edit/{id}', 'LectureController@edit')->name('editLecture');
    Route::post('/lectures/edit/{id}', 'LectureController@update')->name('updateLecture');
    Route::get('/lectures/delete/{id}', 'LectureController@destroy')->name('deleteLecture');

    # Lecture Routes
    Route::get('/assignedLectures', 'AssignedLectureController@index')->name('assignedLectures');
    Route::get('/assignedLectures/add', 'AssignedLectureController@create')->name('addLecture');
    Route::post('/assignedLectures/add', 'AssignedLectureController@store')->name('createLecture');
    Route::get('/assignedLectures/edit/{id}', 'AssignedLectureController@edit')->name('editLecture');
    Route::post('/assignedLectures/edit/{id}', 'AssignedLectureController@update')->name('updateLecture');
    Route::get('/assignedLectures/delete/{id}', 'AssignedLectureController@destroy')->name('deleteLecture');

    # Get Instructors
    Route::post('/get-instructor', 'AssignedLectureController@getinstructor');

    # Assign Instructors for Lecture on Date
    Route::post('/assignedLectures', 'AssignedLectureController@store')->name('assignLecture');

});

