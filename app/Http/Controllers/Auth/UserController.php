<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('auth.authenticate');
    }

    public function store(Request $request)
    {   
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $remember = $request->remember ?? false;
        $user = User::where('username', $validated['username'])->first();

        if(Auth::attempt($validated, $remember)) {
            if($user->role == "admin"){
                $request->session()->regenerate();
                return redirect('/');
            }
        }

        abort(404);
    }

    public function destroy(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}
