<?php


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

Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');


// Layouts and structure
Route::get('/posts', 'PostsController@index');
Route::get('/posts/{post}', 'PostsController@show');

// Eloquent model => Post
// controller => PostsController
// migration => create_posts_table

// php artisna make:model Post
// php artisna make:controller PostsController
// php artisan make:migration create_posts_table --create=posts

// php artisna make:model Post -mc
// php artisan migrate