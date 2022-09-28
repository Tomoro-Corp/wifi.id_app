<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Session::get('login')) {
            return redirect('login')->with('alert', 'Anda belum login, silahkan login terlebih dahulu');
        } else {
            return view('dashboard');
        }
    }

    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $data = User::where('email', $email)->first();
        if ($data) { //apakah email tersebut ada atau tidak
            if (Hash::check($password, $data->password)) {
                Session::put('name', $data->name);
                Session::put('email', $data->email);
                Session::put('login', TRUE);
                return redirect('/');
            } else {
                return redirect('login')->with('alert', 'Email atau Password anda salah!');
            }
        } else {
            return redirect('login')->with('alert', 'Email atau Password anda salah!');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('login')->with('alert', 'Anda telah logout');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function reloadCaptcha()
    {
        return captcha_img('flat');
    }
}
