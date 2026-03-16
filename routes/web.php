<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LeaderboardController;
use App\Http\Controllers\Frontend\MemberController;
use App\Http\Controllers\Frontend\MentorController;
use App\Http\Controllers\Frontend\ClassController;

Route::get('/', [HomeController::class, 'index']);

// LEADERBOARD
Route::get('/leaderboard', [LeaderboardController::class, 'index']);

// MEMBER
Route::get('/member', [MemberController::class, 'index']);
Route::get('/member/{id}', [MemberController::class, 'show']);

// MENTOR 
Route::get('/mentor', [MentorController::class, 'index']);
Route::get('/mentor/{id}', [MentorController::class, 'show']);

// CLASS
Route::get('/class', [ClassController::class, 'index']);
