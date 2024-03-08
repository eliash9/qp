<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Models\User;

class SocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        $domain = request()->getHost();

        if ($domain === 'sivaline.com') {
            config(['services.google.redirect' => 'https://sivaline.com/login/google/callback']);
        } elseif ($domain === 'quizplay.id') {
            config(['services.google.redirect' => 'https://quizplay.id/login/google/callback']);
        } // Add more conditions for additional domains if needed

        
        return Socialite::driver('google')->redirect();
    }
/*
    public function handleGoogleCallback__()
    {
        $user = Socialite::driver('google')->user();

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' =>$request->password,
            'role' => 'pelajar',
        ]);
        auth()->login($user);
        Session()->flash('alert-success', 'Data berhasil disimpan');

        // Lakukan sesuatu dengan informasi pengguna, misalnya simpan ke database

        return redirect('/pelajar');
    }
*/
    public function handleGoogleCallback()
{
    // Mendapatkan data pengguna dari Google
    $googleUser = Socialite::driver('google')->user();

    // Membuat atau mendapatkan pengguna dari database berdasarkan alamat email Google
    $user = User::where('email', $googleUser->email)->first();
    //$username = strtolower(str_slug(explode(' ', $googleUser->name)[0]));
    $username = strtolower(explode(' ', $googleUser->name)[0]);
    // Jika pengguna belum ada, maka buat pengguna baru
    if (!$user) {
        $user = User::create([
            'name' => $googleUser->name,
            'username'=>$username,
            'email' => $googleUser->email,
            'password' => bcrypt($username), // Isi acak untuk password
            'role' => 'pelajar',
            'avatar'=>$googleUser->avatar,
        ]);

        auth()->login($user);
        return redirect('/pelajar');

    }else {
        auth()->login($user);
        return redirect($user->role);

    }

   
}

}
