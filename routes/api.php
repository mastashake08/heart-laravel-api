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
  $msg = $request->Body;
  if($msg == '911' || $msg == 'HELP' || $msg == 'INFO'){
    $response->message('Sending your number to nearest member!');
  }
  else {
    $response->message(
        "Welcome to HEART! Please response with the following: 911, HELP, INFO"
    );
  }


  echo $response;
});
