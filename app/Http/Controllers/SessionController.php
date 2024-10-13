<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function session(Request $request): string
    {
        $request->session()->put('userId', 'murtaki');
        $request->session()->put('IsMember', true);
        return "OK";
    }

    public function getSession(Request $request): string
    {
        $userId = $request->session()->get('userId', 'guest');
        $isMember = $request->session()->get('isMember', false);

        return "User ID : ${userId}, Is Member : ${isMember}";
    }
}
