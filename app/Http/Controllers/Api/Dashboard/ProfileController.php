<?php

namespace App\Http\Controllers\Api\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{


public function getProfile()
{
    $user = Auth::user();

    return response()->json($user);
}
}