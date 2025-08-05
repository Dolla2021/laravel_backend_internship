<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class RegisterController extends Controller
{
    /**
     * Handle a registration request.
     */
    public function register(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed', // expects `password_confirmation` field
        ]);
        // Create a new user with the validated data
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // Create a new personal access token for the user
        $token = $user->createToken('auth_token')->plainTextToken;
        // Return the token along with a success message
        return response()->json([
            'message'      => 'User registered successfully',
            'access_token' => $token,
            'token_type'   => 'Bearer',
        ]);
    }
}