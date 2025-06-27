
@extends('layouts.app')

@section('content')
    <h1 class="text-center mb-5" style="color: #870F96" >O terminu</h1>
    @if($errors->any())
        <div style="font-size: medium;" class="alert alert-danger text-center font-weight-bold">
            @foreach($errors->all() as $error)
            {{$error}}
            @endforeach
        </div>
    @endif
    <div class="row justify-content-center">
        <div style="background-color: #D9D9D9;" class="col-8 p-5">
            <div class="row">
                <div class="col-3 font-weight-bold" style="font-size:large; color: #870F96" >
                     Klijent: 

                </div>
                <div class="col-auto" style="font-size:large; color: #000000" >
                        {{$termin->klijent->ime}} {{$termin->klijent->prezime}}
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-3 font-weight-bold " style="font-size:large; color: #870F96" >
                     Frizer: 

                </div>
                <div class="col-auto" style="font-size:large; color: #000000" >
                        {{$termin->frizer->ime}} {{$termin->frizer->prezime}}
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-3 font-weight-bold" style="font-size:large; color: #870F96" >
                     Datum: 

                </div>
                <div class="col-auto" style="font-size:large; color: #000000" >
                        {{$termin->datum->format('d.m.Y.')}}
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-3 font-weight-bold" style="font-size:large; color: #870F96" >
                     Vreme: 

                </div>
                <div class="col-auto" style="font-size:large; color: #000000" >
                       {{\Carbon\Carbon::parse($termin->vreme)->format('H:i')}}
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-3 font-weight-bold" style="font-size:large; color: #870F96" >
                     Usluga: 

                </div>
                <div class="col-auto" style="font-size:large; color: #000000" >
                       @foreach($termin->uslugas as $usluga)
                            {{$usluga->naziv}} -
                       @endforeach
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-3 font-weight-bold" style="font-size:large; color: #870F96" >
                     Status: 

                </div>
                <div class="col-auto" style="font-size:large; color: #000000" >
                        {{$termin->status}}
                </div>
            </div>
            <div class="row justify-content-around">
                @if(Auth::user()->uloga == 'klijent')
                    <form action="{{route('termins.otkazi',['termin'=>$termin])}}" method="POST" onsubmit="return confirm('Da li ste sigurni da želite da otkažete termin?')">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-danger mt-4 font-weight-bold">Otkaži</button>

                    </form>
                @elseif(Auth::user()->uloga == 'frizer')
                    @if($termin->status == 'nepotvrdjen')
                        <form action="{{route('termins.potvrdi',['termin'=>$termin])}}" method="POST">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-success mt-4 font-weight-bold" type="submit" >Potvrdi</button>
                        </form>
                    @elseif($termin->status == 'potvrdjen')
                        <form action="{{route('termins.zavrsi', ['termin'=>$termin])}}" method="POST">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-custom font-weight-bold mt-5" type="submit">Završi</button>
                        </form>
                        <form action="{{route('termins.propusten',['termin'=>$termin])}}" method="POST">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-danger font-weight-bold mt-5" type="submit">Propušten</button>

                        </form>
                    @elseif($termin->status == 'zavrsen')
                        @if($termin->racun)
                        <a href="{{route('racuns.show', ['racun' =>$termin->racun])}}" class="btn btn-custom mt-4 font-weight-bold">Prikaži račun</a>
                        @else
                        <form action="{{route('termins.generisi',['termin'=>$termin])}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group mt-3">
                                <label  style="color: #870F96"  for="datum" class="form-check-label font-weight-bold" >Način plaćanja:</label>
                                <select name="nacin_placanja" >
                                    <option value="Gotovina">Gotovina</option>
                                    <option value="Kartica">Kartica</option>
                                </select>
                             </div>
                            <button class="btn btn-custom mt-1 font-weight-bold">Generiši račun</button>
                        </form>
                        @endif
                    @endif
                @endif

            </div>
        </div>

    </div>

@endsection

