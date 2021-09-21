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
        'name' => 'required',
        'device_name' => 'required'
      ]);
      $user = User::Create([
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'name' => $request->name,
        'phone_number' => $request->phone
      ]);

      $user->createAsStripeCustomer();
      return response()->json([
        'token' => $user->createToken($request->has('device_name')? $request->device_name : $request->email)->plainTextToken,
        'user' => $user
      ]);
    }


}
