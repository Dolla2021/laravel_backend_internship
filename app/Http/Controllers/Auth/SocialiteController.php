<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Facades\JWTAuth;

class SocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        return response()->json([
            'url' => Socialite::driver('google')->stateless()->redirect()->getTargetUrl(),
        ]);
    }

    public function handleGoogleCallback()
    {
        try {
            // Get the user from Google
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Find or create the user in the database
            $user = User::firstOrCreate(
                ['email' => $googleUser->email],
                [
                    'name' => $googleUser->name,
                    'password' => bcrypt(Str::random(16)), // Generate a random password
                    'google_id' => $googleUser->id,
                ]
            );

            // Log the user in and generate a JWT token
            $token = JWTAuth::fromUser($user);

            return response()->json([
                'authorization' => [
                    'token' => $token,
                    'type' => 'bearer',
                ],
                'user' => $user,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Google login failed.',
                'error' => $e->getMessage(),
            ], 401);
        }
    }
}