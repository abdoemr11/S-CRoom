<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function store() {
//        dd(request());
        $credentialsOld = request()->validate([
            'role' => ['required'],
            'id' => ['required'],
            'password' => ['required'],
        ]);

//        dd($credentials);
        switch (\request('role'))
        {
            case 'STUDENT':
                $credentials = [
                    'student_id' => $credentialsOld['id'],
                    'password'=> $credentialsOld['password']
                ];
                if (Auth::guard('students')->attempt($credentials)) {
                    \request()->session()->regenerate();
                    return redirect('student-profile')->with([
                        'user' => Auth::guard('students')->user()
                    ]);
                }
                break;
            case 'PROFESSOR':

                break;
            case 'ADMIN':
                break;
            default:
                return back()->withErrors([
                    'role' => 'Select proper role to log in',
                ]);
        }
        if (Auth::guard('students')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('test');
        }
//    Auth::guard()->();
        return back()->withErrors([
            'student_id' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function create()
    {
        return view('login');
    }
}
