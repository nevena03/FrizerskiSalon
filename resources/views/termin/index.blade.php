@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <h1 class="text-center">Termini</h1>
        @if(Auth::user()->uloga == 'admin' || Auth::user()->uloga == 'frizer' )
            <div class="row justify-content-center mt-5">
            <ul class="nav nav-tabs justify-content-center col-9">
                <li class="nav-item">
                    <a class="nav-link {{$status == 'nepotvrdjen' ? 'active disabled' : ''}}" href="{{route('termins.index',['status'=>'nepotvrdjen'])}}">Nepotvrđeni</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{$status == 'potvrdjen' ? 'active disabled' : ''}} " href="{{route('termins.index',['status'=>'potvrdjen'])}}">Potvrđeni</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{$status == 'zavrsen' ? 'active disabled' : ''}} " href="{{route('termins.index',['status'=>'zavrsen'])}}">Završeni</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{$status == 'propusten' ? 'active disabled' : ''}} " href="{{route('termins.index',['status'=>'propusten'])}}">Propušteni</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{$status == 'otkazan' ? 'active disabled' : ''}} " href="{{route('termins.index',['status'=>'otkazan'])}}">Otkazani</a>
                </li>
            </ul>

            </div>
        @endif
        @if($termini->isEmpty())
            <div style="font-size: large;" class="alert alert-danger text-center font-weight-bold mt-5">
                Nema termina!
                
            </div>

        @else

        @if(Auth::user()->uloga == 'klijent' || Auth::user()->uloga == 'admin')
            <div class="row justify-content-center mt-3">
                <div style="background-color: #D9D9D9" class="col-9 p-4">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Datum</th>
                        <th>Vreme</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($termini as $termin)
                            <tr>
                                <td>{{$termin->datum->format('d.m.Y.')}}</td>
                                <td>{{\Carbon\Carbon::parse($termin->vreme)->format('H:i')}}</td>
                                <td>
                                    <a href="{{route('termins.show',['termin'=>$termin])}}"class="btn btn-custom">Detaljnije</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>

                </div>

            </div>
        @endif
        @endif
        @if(Auth::user()->uloga == 'frizer')
        <div class="row justify-content-around mt-5 mr-5 ml-5">
        @if(!$termini->isEmpty())
            <div style="background-color: #D9D9D9;" class="col-7 p-3">
                 <table class="table p-3">
                    <thead>
                    <tr>
                        <th>Datum</th>
                        <th>Vreme</th>
                    </tr>
                </thead>
                    <tbody>
                        @foreach($termini as $termin)
                            <tr>
                                <td>{{$termin->datum->format('d.m.Y.')}}</td>
                                <td>{{\Carbon\Carbon::parse($termin->vreme)->format('H:i')}}</td>
                                <td>
                                    <a href="{{route('termins.show',['termin'=>$termin])}}"class="btn btn-custom">Detaljnije</a>
                                </td>
                                @if($termin->status == "nepotvrdjen")
                                <td>
                                    <form action="{{route('termins.destroy', ['termin'=>$termin])}}" method="POST" onsubmit="return confirm('Da li ste sigurni da želite da obrišete termin?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger font-weight-bold w-50" type="submit">Obriši</button>

                                    </form>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                  </table>

            </div>
        @endif
            <div style="background-color: #D9D9D9;" class="col-3 p-3">
                <h4 style="color: #790888" class="text-center mt-2 mb-5" >Obaveštenja</h4>
                @if($obavestenja->isEmpty())
                    <div class="alert alert-danger font-weight-bold text-center ">
                        Nema obaveštenja!
                    </div>
                @else

                @foreach($obavestenja as $obavestenje)
                   <div class="mb-2">
                        <p class="text-center">
                            <a style="color: #000000" href="{{route('termins.show',['termin'=>$obavestenje->termin])}}" class="text-center font-weight-bold"> Termin za: {{$obavestenje->termin->klijent->ime}}              {{$obavestenje->termin->klijent->prezime}}
                            </a>
                        </p>
                      
                        <p style="color:  #000000;" class="text-center">
                            {{$obavestenje->poruka}}
                        </p>
                        <p style="color:  #000000;" class="text-center" >
                            {{$obavestenje->datum->format('d.m.Y.')}}
                        </p>
                        <p>
                            <form action="{{route('obavestenjas.destroy',['obavestenja'=>$obavestenje])}}" method="POST" class="text-center" >
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger font-weight-bold">Obriši</button>
                            </form>
                        </p>
                        
                   </div>
                @endforeach
                @endif

            </div>


        </div>
        @endif

    </div>

@endsection


