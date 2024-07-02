<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;

class TokenAuthController extends Controller
{
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $user = User::where('phone_number', $request->phone_number)->first();

        return $user->createToken($request->phone_number)->plainTextToken;
    }

    public function destroy(Request $request)
    {
        $request->user()->tokens()->delete();
    }

    // public function sendSMS(Request $request)
    // {
    //     $validated = $request->validate(['phone_number' => ['required', 'regex:/^[\+0-9]{9,13}$/', 'numeric'],]);
    //     $user = User::where('phone_number', $validated['phone_number'])->first();
    //     if(!$user){
    //         return response()->json([
    //             'message' => __('auth.failed_login')
    //         ], 422);
    //     }

    //     $user->notify(new SendVerifySMS());
    // }
}
