<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginAuthenticationRequest;
use App\Http\Requests\RegisterAuthenticationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    public function view(): View{
        return view('register');
    }

    public function store(RegisterAuthenticationRequest $request){
        $input = $request->validated();
        $user = new User;
        $user->fill([
            'user_username' => $input['username'],
            'user_role' => $input['role'],
            'user_createdAt' => date_create()
        ]);
        $user->user_password = Hash::make($input['password']);
        $user->saveOrFail();
        return response()->json(['type' => 'success']);
    }
}
