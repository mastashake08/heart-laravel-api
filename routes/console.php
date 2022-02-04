<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('therapists', function () {
    $therapists = \App\Http\Resources\UserResource::collection(\App\Models\User::all());
    $therapists->each(function ($t) {
      $this->comment($t->first_name);
    });

})->purpose('Display therapists in console');
