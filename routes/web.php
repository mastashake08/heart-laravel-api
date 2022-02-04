<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\User;
use App\Http\Resources\UserResource;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::get('therapist', function () {
  $users = User::all();
  dd(UserResource::collection($users));
    //return Inertia::render('Welcome');
  return view('therapists.all', ['users' => $users]);
})->name('all-therapist');

Route::get('therapist/{id}', function (User $user) {
  dd($user);
  return view('therapists.single', ['user' => $user]);
})->name('therapist');

Route::get('hotline', function () {
    return Inertia::render('Welcome');
})->name('hotline');
