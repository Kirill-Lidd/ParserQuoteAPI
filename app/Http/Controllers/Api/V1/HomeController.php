<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    function index()
    {
        $user = auth()->user();

        return view('home',compact('user'));
    }

    function editToken(Request $request)
    {
        $data = $request->validate([
               'token' => 'required'
           ]);

        auth()->user()->update($data);

        return back();
    }
}
