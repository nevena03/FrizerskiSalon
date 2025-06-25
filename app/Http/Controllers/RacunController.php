<?php

namespace App\Http\Controllers;

use App\Http\Requests\RacunStoreRequest;
use App\Models\Racun;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RacunController extends Controller
{
    public function index(Request $request)
    {
        $racuns = Racun::all();

        return view('racun.index', [
            'racuns' => $racuns,
        ]);
    }

    public function create(Request $request)
    {
        return view('racun.create');
    }

    public function store(RacunStoreRequest $request)
    {
        $racun = Racun::create($request->validated());

        $request->session()->flash('racun.id', $racun->id);

        return redirect()->route('racuns.index');
    }

    public function show(Request $request, Racun $racun)
    {
        return view('racun.show', [
            'racun' => $racun,
        ]);
    }
}
