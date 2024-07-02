<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;


class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterRequest $request)
    {
        return DB::transaction(function () use ($request) {

            $role = Role::where('name', $request->role)->first();

            if (!$role) {
                $role_id = Role::create([
                    'name' => $request->role
                ])->id;
            } else {
                $role_id = $role->id;
            }

            $user = User::create(array_merge($request->safe()->except('role'), ['role_id' => $role_id]));

            event(new Registered($user));


            return response()->json([
                'message' => __('api.You have registred to our app successfully please verify your phone number to continue')
            ], 200);
        });
    }
}
