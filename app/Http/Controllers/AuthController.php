<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function processLogin(Request $request)
    {
        try {
            $account = Account::query()
                ->where('username', $request->get('username'))
                ->where('password', $request->get('password'))
                ->firstOrFail();
            session()->put('username', $account->username);
            session()->put('role', $account->role);
            session()->put('name', $account->name);

            return redirect()->route('index');
        } catch (\Throwable $th) {
            return redirect()->route('login');
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }

    public function index()
    {
        if (session()->get('role') === 1) {
            return route(view('teacher.index'));
        } else {
            return route(view('student.index'));
        }
    }
}
