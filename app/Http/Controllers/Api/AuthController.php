<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function user()
    {
        return $this->loginSuccess(auth()->user());
    }
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required',
            'remember_me' => 'boolean',
        ]);
        $user = User::where('email', $request->email)
            ->first();
        if ($user != null) {
            if (Hash::check($request->password, $user->password)) {
                // if ($user->email_verified_at == null) {
                //     return response()->json(['result' => false, 'message' => 'Please verify your account', 'user' => null], 401);
                // }
                return $this->loginSuccess($user);
            } else {
                return response()->json(['result' => false, 'message' => 'Unauthorized', 'user' => null], 401);
            }
        } else {
            return response()->json(['result' => false, 'message' => 'User not found', 'user' => null], 401);
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'referral_code' => uniqid('BLOG-') . time(),
            'password' => Hash::make($request->password),
        ]);
        $user->syncRoles('user');

        if ($request->has('refer_code')) {
            $user->referred_by = $request->refer_code;
            $user->save();
            $referer = User::where('referral_code', $request->refer_code)->first();
            if ($referer) {
                $referer_list = json_decode($referer->referred_to);
                if ($referer_list) {
                    array_push($referer_list, $user->referral_code);
                } else {
                    $referer_list = [$user->referral_code];
                }
                $point = (int) get_setting('refer_point') + (int) $referer->point;
                $referer->referred_to = json_encode($referer_list);
                $referer->point = $point;
                $referer->save();
            }

        }
        return $this->loginSuccess($user);
    }

    public function logout()
    {
        $user = request()->user();
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();

        return response()->json([
            'result' => true,
            'message' => 'Successfully logged out'
        ]);
    }

    protected function loginSuccess($user)
    {
        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json([
            'result' => true,
            'message' => 'Successfully logged in',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_at' => null,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'avatar' => asset('storage/'.$user->avatar_original),
                'phone' => $user->phone,
                'address' => $user->address,
            ]
        ]);
    }
}