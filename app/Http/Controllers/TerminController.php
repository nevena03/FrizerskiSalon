<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\TerminStoreRequest;
use App\Http\Requests\TerminUpdateRequest;
use App\Models\Obavestenja;
use App\Models\Termin;
use App\Models\User;
use App\Models\Usluga;
use App\Models\Racun;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class TerminController extends Controller
{
    public function index(Request $request)
    {
       $user = Auth::user();
       if($user->uloga =='klijent')
       {
            $termini = Termin::where('klijent_id',$user->id)
                ->where('status','potvrdjen')->get();
            
            
       }
       elseif($user->uloga == 'frizer')
       {
            $status = $request->query('status','nepotvrdjen');
            $frizer_termini = $user->termins;
            $termini_id = $frizer_termini->pluck('id');
            $obavestenja = Obavestenja::whereIn('termin_id',$termini_id)->get();
            if($status == 'nepotvrdjen')
            {
                $termini = Termin::where('frizer_id', $user->id)
                ->where('status', 'nepotvrdjen')->get();
            }
            elseif($status == 'potvrdjen')
            {
                $termini = Termin::where('frizer_id', $user->id)
                ->where('status', 'potvrdjen')->get();

            }
            elseif($status == 'zavrsen')
            {
                $termini = Termin::where('frizer_id', $user->id)
                ->where('status', 'zavrsen')->get();
            }
            elseif($status == 'propusten')
            {
                $termini = Termin::where('frizer_id', $user->id)
                ->where('status', 'propusten')->get();
            }
            elseif($status == 'otkazan')
            {
                $termini = Termin::where('frizer_id', $user->id)
                ->where('status', 'otkazan')->get();
            }
       }
       elseif($user->uloga == 'admin')
       {
        $status = $request->query('status','nepotvrdjen');
        if($status == 'nepotvrdjen')
        {
            $termini = Termin::where('status', 'nepotvrdjen')->get();
        }
        elseif($status == 'potvrdjen')
        {
            $termini = Termin::where('status', 'potvrdjen')->get();

        }
        elseif($status == 'zavrsen')
        {
            $termini = Termin::where('status', 'zavrsen')->get();
        }
        elseif($status == 'propusten')
        {
            $termini = Termin::where('status', 'propusten')->get();
        }
        elseif($status == 'otkazan')
        {
            $termini = Termin::where('status', 'otkazan')->get();
        }

       }
     
       if($user->uloga == 'admin')
       {
            return view('termin.index',compact('termini', 'status'));
       }
       elseif($user->uloga == 'frizer')
       {
        return view('termin.index',compact('termini', 'status', 'obavestenja'));

       }
       else
       {
            return view('termin.index',compact('termini'));
       }
    }

    public function create(Request $request)
    {
        $frizeri = User::where('uloga', 'frizer')->get();
        $usluge = Usluga::all();
        return view('termin.create', compact('frizeri', 'usluge'));
    }

    public function store(TerminStoreRequest $request)
    {
        $datum = $request->input('datum');
        $vreme = $request->input('vreme');
        $frizer = $request->input('frizer_id');

        $vreme = Carbon::createFromFormat('H:i:s', $vreme);

        $zakazan_termin = Termin::where('datum', $datum)
            ->where('frizer_id', $frizer)
            ->where('status', 'potvrdjen')
            ->where('vreme', $vreme)
            ->exists();
        if($zakazan_termin)
        {
            return redirect()->route('termins.create')
            ->withErrors(['vreme' => 'Frizer već ima zakazan termin u to vremes!'])
            ->withInput();

        }
        
        $termin = new Termin();

        $termin->datum = $datum;
        $termin->vreme = $vreme;
        $termin->frizer_id = $frizer;
        $termin->klijent_id = Auth::id();
        $termin->status = "nepotvrdjen";
        $termin->save();


        $termin->uslugas()->attach($request->usluge);

        $obavestenje = new Obavestenja();

        $obavestenje -> poruka = 'Novi termin je kreiran!';
        $obavestenje -> datum = $termin->created_at;
        $obavestenje -> termin_id = $termin->id;
        $obavestenje->save();


        session()->flash('success', 'Zahtev za termin je poslat!');
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
    public function potvrdi(Termin $termin)
    {
        $vreme = Carbon::parse($termin->datum)->setTimeFromTimeString($termin->vreme);

        $sada = Carbon::now();

        if($sada->diffInMinutes($vreme, false) > 180){
            return redirect()->route('termins.show', $termin)->withErrors(['error' => 'Termin mora biti potvrđen minimun tri sata pre njegovog početka!']);

        }
        
        $termin->update([
            'status' => 'potvrdjen'
        ]);
        return redirect()->route('termins.index', ['status'=> 'potvrdjen'])->with('success','Termin je potvrđen!');
    }
    public function zavrsi(Termin $termin)
    {
        $termin->update([
            'status' => 'zavrsen'
        ]);
        return redirect()->route('termins.index',['status'=> 'zavrsen'])->with('success', 'Termin je završen!');
    }
    public function propusten(Termin $termin)
    {
        $termin->update([
            'status' => 'propusten'
        ]);
        return redirect()->route('termins.index' ,['status' => 'propusten'])->with('success', 'Termin je propušten');
    }
    public function otkazi(Termin $termin)
    {
        $vreme = Carbon::parse($termin->datum)->setTimeFromTimeString($termin->vreme);

        $sada = Carbon::now();

        if($sada->diffInMinutes($vreme, false) < 180){
            return redirect()->route('termins.show', $termin)->withErrors(['error' => 'Termin se ne može otkazati tri sata pre njegovog početka!']);

        }
        
        $termin->status = 'otkazan';
        $termin->save();

        $obavestenje = new Obavestenja();
        $obavestenje -> poruka = 'Termin je otkazan!';
        $obavestenje -> datum = Carbon::now();
        $obavestenje -> termin_id = $termin->id;
        $obavestenje ->save();

        return redirect()->route('termins.index')->with('success', 'Termin je otkazan!');
    }
    public function destroy(Termin $termin)
    {
        $termin->delete();

        return redirect()->route('termins.index')->with('success', 'Termin je obrisan!');

    }
    public function generisi(Termin $termin)
    {
        if($termin->racun)
        {
            return redirect()->route('racuns.show', $termin->racun);
        }
        $usluge = $termin->uslugas;
        $ukupna_cena = $usluge -> sum('cena');
        DB::beginTransaction();
        try
        {
            $racun = Racun::create([
                'ukupna_cena' => $ukupna_cena,
                'nacin_placanja' => 'gotovina',
                'datum_izdavanja' => Carbon::today(),
                'termin_id' => $termin->id
            ]);
            foreach($usluge as $usluga)
            {
                $racun->uslugas()->attach($usluga->id,[
                    'cena' => $usluga->cena
                ]);
            }
            DB::commit();
            return redirect()->route('racuns.show', $termin->racun)->with('success','Račun je uspešno generisan!');
        }
        catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('termins.show', $termin)->withErrors(['error'=> 'Desila se greška!']);
        }

    }

}
