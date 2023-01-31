<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if (!$user->profile) {
            $user->profile()->create();
        }


        return view('profile.index', compact('user'));
    }
}
