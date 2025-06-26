<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Laravel\Ui\Presets\React;



class UserController extends Controller
{
    public function index(Request $request)
    {
        $uloga = $request->query('uloga', 'frizer');
        
        $users = User::where('uloga',$uloga)->get();

        return view('user.index', [
            'users' => $users,
            'uloga' => $uloga,
        ]);
    }

    public function show(Request $request, User $user)
    {
        if (auth()->id() != $user->id)
        {
            abort(403, 'Nemate dozvolu da pristupite ovoj stranici.');
        }
        return view('user.show', [
            'user' => $user,
        ]);
    }
    
    public function edit(Request $request, User $user)
    {
        if (auth()->id() != $user->id)
        {
            abort(403, 'Nemate dozvolu da pristupite ovoj stranici.');
        }
        return view('user.edit', [
            'user' => $user,
        ]);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        if (auth()->id() != $user->id)
        {
            abort(403, 'Nemate dozvolu da pristupite ovoj stranici.');
        }

        $podaci = $request->only(['ime','prezime','broj_telefona','username']);

        if($request->filled('password'))
        {
            if(!Hash::check($request->old_password, $user->password))
            {
                return redirect()->route('users.edit', $user)->withErrors(['old_password' => 'Uneta loznika se ne poklapa sa starom!'])->withInput();
            }

            $podaci['password'] = Hash::make($request->password);

        }
        $user->update($podaci);
        return redirect()->route('users.show', $user)->with('success', 'Profil je uspešno ažuriran!');
    
    }

    public function destroy(Request $request, User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success','Uspešno ste obrisali korisnika!');
    }
}
