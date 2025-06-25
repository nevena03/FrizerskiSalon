
@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-center">O računu</h1>
        <div class="row justify-content-center mt-3">
            <div class="col-9 p-4" style="background-color: #D9D9D9;">
                <div class="row">
                    <div class="col-6 p-3">
                         <h4 class="mb-3 text-center">Informacije</h4>
                        <hr>
                       <p class="text-center"><b>Klijent: </b>{{$racun->termin->klijent->ime}} {{$racun->termin->klijent->prezime}}</p>
                       <p class="text-center"><b>Način plaćanja: </b>{{$racun->nacin_placanja}}</p>
                       <p class="text-center"><b>Datum izdavanja: </b>{{$racun->datum_izdavanja->format('d.m.Y.')}}</p>


                    </div>
                    <div class="col-6 p-3">
                        <h4 class="mb-3 text-center">Usluge</h4>
                        <hr>
                        @foreach($racun->uslugas as $usluga)
                            <p class="text-center">{{$usluga->naziv}} {{$usluga->pivot->cena}} RSD</p>
                        @endforeach
                        <hr>
                         <p class="text-center"><b>Ukupna cena: {{$racun->ukupna_cena}}</b></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

