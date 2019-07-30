<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Contracts\Auth\Guard;

class AuthController extends Controller
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function getLogin()
    {
        return view('admin.login');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function postLogin(LoginRequest $request)
    {
        $isSuccess = Auth::guard('admin')->attempt([
            'email'    => $request->input('email'),
            'password' => $request->input('password'),
        ]);


        if (!$isSuccess) {
            return redirect()->back();
        }

        return redirect()->route('admin.home.index');
    }

    public function getLogout(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }
        if (Auth::check()) {
            Auth::logout();
        }

        return redirect()->route('admin.home.index');
    }
}
