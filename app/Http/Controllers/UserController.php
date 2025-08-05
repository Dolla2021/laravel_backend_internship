<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class UserController extends Controller
{
    /**
     * Retrieve the authenticated user.
     */
    public function getUser(Request $request)
    {
        return response()->json($request->user());
    }
}