<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Landing
|--------------------------------------------------------------------------
*/

Route::view('/', 'landing.index')->name('landing');
Route::view('/leaderboard', 'leaderboard.index')->name('leaderboard');

/*
|--------------------------------------------------------------------------
| Auth
|--------------------------------------------------------------------------
*/

Route::view('/login', 'auth.login')->name('login');


/*
|--------------------------------------------------------------------------
| Member Routes
|--------------------------------------------------------------------------
*/

Route::prefix('member')->name('member.')->group(function () {

    Route::view('/dashboard', 'member.dashboard')->name('dashboard');

    Route::view('/classes', 'member.classes')->name('classes');

    Route::view('/classes/{id}', 'member.class-detail')->name('class.detail');

    Route::view('/tasks/{id}', 'member.task-detail')->name('task.detail');

    Route::view('/tasks/{id}/submit', 'member.submit-task')->name('task.submit');

});


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {

    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');

    Route::view('/classes', 'admin.classes')->name('classes');

    Route::view('/classes/{id}', 'admin.class-detail')->name('class.detail');

    Route::view('/users', 'admin.users')->name('users');

    Route::view('/users/create', 'admin.create-user')->name('users.create');

    Route::view('/leaderboard', 'admin.leaderboard')->name('leaderboard');

});


/*
|--------------------------------------------------------------------------
| Mentor Routes
|--------------------------------------------------------------------------
*/

Route::prefix('mentor')->name('mentor.')->group(function () {

    Route::view('/dashboard', 'mentor.dashboard')->name('dashboard');

    Route::view('/classes', 'mentor.classes')->name('classes');

    Route::view('/classes/{id}', 'mentor.class-detail')->name('class.detail');

    Route::view('/tasks', 'mentor.tasks')->name('tasks');

    Route::view('/submissions', 'mentor.submissions')->name('submissions');

});