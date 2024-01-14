<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserDetailController extends Controller
{
    public function getUserDetails($userId)
    {
        // Fetch user details from the database based on $userId
        $user = User::find($userId);

        // Return user details as JSON response
        return response()->json($user);
    }
}
