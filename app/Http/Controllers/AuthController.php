<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
class AuthController extends Controller
{
    /**
     * Register a new user and return a JWT token.
     */
    public function register(Request $request)
    {
        // Validate incoming request.
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed', // requires a password_confirmation field
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        // Create the user.
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // Generate a JWT token for the new user.
        $token = JWTAuth::fromUser($user);
        return response()->json([
            'status'        => 'success',
            'message'       => 'User registered successfully',
            'user'          => $user,
            'authorization' => [
                'token' => $token,
                'type'  => 'Bearer',
            ],
        ], 201);
    }
    /**
     * Authenticate a user and return a JWT token.
     */
    public function login(Request $request)
    {
        // Validate incoming request.
        $credentials = $request->only('email', 'password');
        $validator = Validator::make($credentials, [
            'email'    => 'required|email',
            'password' => 'required|string|min:6'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        // Attempt to create a token for the user.
        if (! $token = auth()->attempt($credentials)) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Invalid login credentials',
            ], 401);
        }
        return response()->json([
            'status'        => 'success',
            'message'       => 'User logged in successfully',
            'authorization' => [
                'token' => $token,
                'type'  => 'Bearer',
            ],
        ]);
    }
    /**
     * Get the authenticated User.
     */
    public function me()
    {
        return response()->json(auth()->user());
    }
    /**
     * Invalidate the token and log out the user.
     */
    public function logout()
    {
        auth()->logout();
        return response()->json([
            'status'  => 'success',
            'message' => 'User logged out successfully'
        ]);
    }
    /**
     * Refresh an expired token.
     */
    public function refresh()
    {
        return response()->json([
            'status'        => 'success',
            'authorization' => [
                'token' => auth()->refresh(),
                'type'  => 'Bearer',
            ],
        ]);
    }
    /**
     * Update the profile of the authenticated user.
     */
    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        // Validate update request.
        $validator = Validator::make($request->all(), [
            'name'     => 'sometimes|required|string|max:255',
            'email'    => 'sometimes|required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'sometimes|required|string|min:6|confirmed'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        if($request->has('name')){
            $user->name = $request->name;
        }
        if($request->has('email')){
            $user->email = $request->email;
        }
        if($request->has('password')){
            $user->password = Hash::make($request->password);
        }
        $user->save();
        
        return response()->json([
            'status'  => 'success',
            'message' => 'Profile updated successfully',
            'user'    => $user
        ]);
    }
    /**
     * Delete the authenticated user's account.
     */
    public function deleteAccount()
    {
        $user = auth()->user();
        $user->delete();
        // Invalidate the token if necessary.
        auth()->logout();
        return response()->json([
            'status'  => 'success',
            'message' => 'User account deleted successfully'
        ]);
    }
    public function user() {
        return response()->json(auth()->user());
    }
}