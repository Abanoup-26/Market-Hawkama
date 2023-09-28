<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SupporterLoginController extends Controller
{
    use AuthenticatesUsers;
    public function showLoginForm()
    {
        return view('auth.supporterlogin');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'phone_number' => 'required|'.config('panel.phone_format'),
        ]);

        $phone_number = $request->get('phone_number');

        // Find the user by phone number
        $user = User::where('phone_number', $phone_number)->first();

        // Check if the user exists
        if (!$user) { 
            return view('auth.register',compact('phone_number'));
        }

        // Authenticate the user
        Auth::login($user);

        return redirect()->route('frontend.cart.index');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}

