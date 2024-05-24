<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthAdminRequest;

class AdminController extends Controller
{
    /**
     * Render the admin home page
     */
    public function index()
    {
        return view('admin.index');
    }

     /**
     * Render the login page
     */
    public function login()
    {
        if (!auth()->guard('admin')->check()) {
            return view('admin.login');
        }

        return redirect()->route('admin.index');
    }

    /**
     * Authenticate the admin
     */
    public function auth(AuthAdminRequest $request)
    {
        if($request->validated()) {
            if(auth()->guard('admin')->attempt([
                'email' => $request->email,
                'password' => $request->password
            ])) {
                $request->session()->regenerate();
                return redirect()->route('admin.index');
            }else {
                return redirect()->route('admin.login')->with([
                    'error' => 'These credentials do not match any of our records.'
                ]);
            }
        }
    }

    /**
     * Logout the admin
     */
    public function logout()
    {
        auth()->guard('admin')->logout();

        return redirect()->route('admin.login');
    }
}
