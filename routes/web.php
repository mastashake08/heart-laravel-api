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
  //return Inertia::render('Welcome');
  return view('welcome');
});

Route::get('hotline', function () {
  return Inertia::render('HotlineComponent');
})->name('hotline');

Route::get('about', function () {
  return Inertia::render('About');
})->name('about');

Route::get('pricing', function () {
  return Inertia::render('Pricing');
})->name('pricing');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::get('therapist', function () {
  $users = User::all();
  return Inertia::render('Therapist/All', ['users' => UserResource::collection($users)]);
  //return view('therapists.all', ['users' => UserResource::collection($users)]);
})->name('therapists');

Route::get('therapist/{id}', function (User $user) {
  //dd(new UserResource($user));
  return Inertia::render('Therapist/Single', ['user' => new UserResource($user)]);
  //return view('therapists.single', ['user' => new UserResource($user)]);
})->name('therapist');
