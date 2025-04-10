<?php

namespace App\Http\Controllers;

use App\Http\Requests\TerminStoreRequest;
use App\Http\Requests\TerminUpdateRequest;
use App\Models\Termin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TerminController extends Controller
{
    public function index(Request $request)
    {
        $termins = Termin::all();

        return view('termin.index', [
            'termins' => $termins,
        ]);
    }

    public function create(Request $request)
    {
        return view('termin.create');
    }

    public function store(TerminStoreRequest $request)
    {
        $termin = Termin::create($request->validated());

        $request->session()->flash('termin.id', $termin->id);

        return redirect()->route('termins.index');
    }

    public function show(Request $request, Termin $termin)
    {
        return view('termin.show', [
            'termin' => $termin,
        ]);
    }

    public function edit(Request $request, Termin $termin)
    {
        return view('termin.edit', [
            'termin' => $termin,
        ]);
    }

    public function update(TerminUpdateRequest $request, Termin $termin)
    {
        $termin->update($request->validated());

        $request->session()->flash('termin.id', $termin->id);

        return redirect()->route('termins.index');
    }
}
