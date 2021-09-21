<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    //
    public function requestToken(Request $request) {
      $request->validate([
          'email' => 'required|email',
          'password' => 'required',
      ]);

      $user = User::where('email', $request->email)->first();
      if (! $user || ! Hash::check($request->password, $user->password)) {
          return response()->json(['error' => 'Incorrect credentials!.'], 401);
      }
      $data = [
        'token' => $user->createToken($request->has('device_name')? $request->device_name : $request->email)->plainTextToken,
        'user' => new UserResource($user)
      ];

      $user->createOrGetStripeCustomer();
      $ret = response()->json($data);
      return $ret;
    }

    public function register(Request $request) {

      $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
      ]);
      $user = User::Create([
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'first_name' => $request->name,
        'last_name' => $request->last_name,
        'account_type' => 'Mental Health',
        'address' => $request->address,
        'mental_health_license_type' => 'asbsd',
        'mental_health_license_number' => '11111',
        'mental_health_license_state' => 'KY'
      ]);

      $user->createAsStripeCustomer();
      return response()->json([
        'token' => $user->createToken($request->has('device_name')? $request->device_name : $request->email)->plainTextToken,
        'user' => $user
      ]);
    }


}
