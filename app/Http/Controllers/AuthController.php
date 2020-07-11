<?php

namespace App\Http\Controllers;

use App\Model\User;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
    	if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
    		return back();
    	}
    	return back()->with('danger', 'Login Gagal, Username Atau Password Tidak Ditemukan');
    }
    public function register()
    {
    	$user = User::where('email', request('email'))->first();
    	if($user) return back('danger', 'Registrasi Gagal, Email Sudah Terdaftar');
    	$user = new User;
    	$user->email = request('email');
    	$user->name = request('name');
    	$user->password = bcrypt(request('password'));
    	$user->point = 0;
    	$user->save();
    	Auth::login($user);
    	return back()->with('success', 'Registrasi Berhasil Dilakukan');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Berhasil Keluar dari Sistem');
    }
}
