<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected function redirectTo()
    {
        if (auth()->user()->uloga === 'admin')
        {
            return route('users.index');
        }

        return '/home';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(function($request, $next)
        {
            if(auth()->check() && auth()->user()->uloga != 'admin')
            {
                return redirect('/home');
            }
            return $next($request);
        });
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'ime' => ['required', 'string', 'max:255'],
            'prezime' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255','unique:users'],
            'broj_telefona' => ['required', 'string', 'size:10','unique:users','regex:/^\d+$/'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],
        [
            //OVDE IDU CUSTOM PORUKE
            'ime.required' => 'Ime je obavezno polje',
            'prezime.required' => 'Prezime je obavezno polje',
            'username.required' => 'Username je obavezno polje',
            'broj_telefona.required' => 'Broj telefona je obavezno polje',
            'password.required' => 'Lozinka je obavezno polje',
            'username.unique' => 'Username je zauzet',
            'password.min' => 'Lozinka mora imati minimun 8 karaktera',
            'password.confirmed' => 'Lozinke se ne poklapaju',
            'broj_telefona.size' => 'Broj telefona mora imati tačno 10 cifara',
            'broj_telefona.unique' => 'Broj telefona vec postoji',
            'broj_telefona.regex' => 'Broj telefona mora imati samo cifre'


        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'ime' => $data['ime'],
            'prezime' => $data['prezime'],
            'username' => $data['username'],
            'broj_telefona' => $data['broj_telefona'],
            'password' => Hash::make($data['password']),
            'uloga' => $data['uloga'] ?? 'klijent'
        ]);
    }
}
