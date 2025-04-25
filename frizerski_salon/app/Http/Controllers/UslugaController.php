<?php

namespace App\Http\Controllers;

use App\Http\Requests\UslugaStoreRequest;
use App\Http\Requests\UslugaUpdateRequest;
use App\Models\Usluga;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UslugaController extends Controller
{
    public function index(Request $request)
    {
        $uslugas = Usluga::all();

        return view('usluga.index', [
            'uslugas' => $uslugas,
        ]);
    }

    public function create(Request $request)
    {
        return view('usluga.create');
    }

    public function store(UslugaStoreRequest $request)
    {
        $usluga = new Usluga($request->validated());
        $usluga ->administrator_id = Auth::id();
        $usluga->save();

        return redirect()->route('uslugas.index')->with('success', 'Uspešno dodata nova usluga!');
    }

    public function show(Request $request, Usluga $usluga)
    {
        return view('usluga.show', [
            'usluga' => $usluga,
        ]);
    }

    public function edit(Request $request, Usluga $usluga)
    {
        return view('usluga.edit', [
            'usluga' => $usluga,
        ]);
    }

    public function update(UslugaUpdateRequest $request, Usluga $usluga)
    {
        $usluga->update($request->validated());

        $request->session()->flash('usluga.id', $usluga->id);

        return redirect()->route('uslugas.index')->with('success', 'Uspešno izmenjena usluga!');
    }

    public function destroy(Request $request, Usluga $usluga)
    {
        $usluga->delete();

        return redirect()->route('uslugas.index');
    }
}
