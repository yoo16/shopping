<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function find(Request $reauest)
    {
        $user = User::find($reauest->id);
        return response()->json($user);
    }

    public function get()
    {
        $users = User::limit(10)->orderBy('id')->get();
        return response()->json($users);
    }
}
