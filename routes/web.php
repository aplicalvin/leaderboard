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
Route::get('/daftar-member', [MemberController::class, 'index']);

// MENTOR 
Route::get('/daftar-mentor', [MentorController::class, 'index']);
Route::get('/daftar-mentor/{id}', [MentorController::class, 'show']);

// CLASS
Route::get('/class', [ClassController::class, 'index']);

Route::get('/{username}', [MemberController::class, 'show']);