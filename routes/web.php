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
    $video = 'Pass Data to Your Views';
    $link = 'https://laracasts.com/series/laravel-from-scratch-2017/episodes/5';

    $watched = [
        'Laravel Installation and Composer',
        'Basic Routing and Views',
        'Laravel Valet is Your Best Friend',
        'Database Setup and Sequel Pro',
        'Pass Data to Your Views',
        'Working With the Query Builder',
    ];

    return view('welcome2', [
        'title' => 'Laracast'
    ])
    ->with('subtitle', 'Laravel 5.4 from scratch')
    ->with(compact('video', 'link', 'watched'))
    ;
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/tasks', function() {
    $tasks = DB::table('tasks')->get();
    return view('tasks.index')->with(compact('tasks'));
});

Route::get('/tasks/{id}', function(int $id) {
    $task = DB::table('tasks')->find($id);
    return view('tasks.show')->with(compact('task'));
});
