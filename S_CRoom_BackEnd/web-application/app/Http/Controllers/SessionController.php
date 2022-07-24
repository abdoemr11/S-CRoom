<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function store() {
        $credentialsOld = request()->validate([
            'role' => ['required'],
            'id' => ['required'],
            'password' => ['required'],
        ]);

        switch (\request('role'))
        {
            case 'STUDENT':
                $credentials = [
                    'id' => $credentialsOld['id'],
                    'password'=> $credentialsOld['password']
                ];

                if (Auth::guard('students')->attempt($credentials)) {
                    session()->regenerate();
                    return redirect('student-profile')->with([
                        'user' => Auth::guard('students')->user()
                    ]);

                }
                break;
            case 'PROFESSOR':
                $credentials = [
                    'id' => $credentialsOld['id'],
                    'password'=> $credentialsOld['password']
                ];

                if (Auth::guard('professors')->attempt($credentials)) {
                    session()->regenerate();
                    return redirect('proflog');

                }
                break;
            case 'ADMIN':
                $credentials = [
                    'id' => $credentialsOld['id'],
                    'password'=> $credentialsOld['password']
                ];

                if (Auth::guard('admins')->attempt($credentials)) {
                    session()->regenerate();
                    return redirect('admin');

                }
                break;

            default:
                return back()->withErrors([
                    'id' => 'Select proper role to log in',
                ]);
        }

        return back()->withErrors([
            'id' => 'ID or password is wrong',
        ]);
        }
//    Auth::guard()->();


    public function create()
    {
        return view('login');
    }
    public function destroy($role)
    {
        auth()->guard($role)->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
