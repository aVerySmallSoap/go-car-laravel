<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginAuthenticationRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{

    public function view(): View{
        return view('login');
    }

    public function authenticate(LoginAuthenticationRequest $request): JsonResponse{
        $input = $request->validated();
        if(Auth::attempt(['user_username' => $input['username'], 'password' => $input['password']])){
            $request->session()->regenerate();
            return response()->json(['type' => 'success', 'message' => 'login successful!']);
        }
        return response()->json(['errors' => ['password' => 'Wrong password']]);
    }

    public function logout(): RedirectResponse{
        session()->flush();
        return redirect('/login');
    }
}
