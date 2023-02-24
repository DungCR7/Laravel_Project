<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('Admin.user.Login');
    }
    public function store(Request $request)
    {
      
        $this->validate($request, [
            'Email' => 'required|Email:filter',
            'password' => 'required'
        ]);
        if (Auth::attempt([
            'Email' => $request->input('Email'),
            'password' => $request->input('password')
        ], $request->input('remember'))) {
            return redirect()->route('admin');
        }
        return redirect()->back()->onlyInput('Email');
        $dat = [
            'Email'=>$request->Email,
             'password'=>$request ->password,
          ];
          DB::table('users');
                       return redirect()-> route('admin');
    }
}