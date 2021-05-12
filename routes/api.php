<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Twilio\TwiML\MessagingResponse;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/sms', function(Request $request) {
  header("content-type: text/xml");

  $response = new MessagingResponse();
  $response->message(
      "Welcome to HEART!"
  );

  echo $response;
});
