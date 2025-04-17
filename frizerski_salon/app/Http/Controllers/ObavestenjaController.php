<?php

namespace App\Http\Controllers;

use App\Models\Obavestenja;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ObavestenjaController extends Controller
{
   public function destroy(Request $request, Obavestenja $obavestenja)
   {
        $obavestenja -> delete();
        return redirect()->route('termins.index');
   }
}
