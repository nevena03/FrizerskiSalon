<?php

namespace App\Http\Controllers;

use App\Models\Obavestenja;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ObavestenjaController extends Controller
{
    public function index(Request $request)
    {
        $obavestenjas = Obavestenja::all();

        return view('obavestenja.index', [
            'obavestenjas' => $obavestenjas,
        ]);
    }

    public function show(Request $request, Obavestenja $obavestenja)
    {
        return view('obavestenja.show', [
            'obavestenja' => $obavestenja,
        ]);
    }
}
