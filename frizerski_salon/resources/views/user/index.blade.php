
@extends('layouts.app')

@section('content')
    <div class="row justify-content-end mr-5  mt-3">
        <a style="font-weight: bold;"  class="btn btn-success" href="{{route('register')}}">Dodaj novog korisika</a>
    </div>
    <h1 class="text-center" >Svi korisnici</h1>
    <div class="row justify-content-center mt-5">
            <ul class="nav nav-tabs justify-content-center col-9">
                <li class="nav-item">
                    <a class="nav-link {{$uloga == 'frizer' ? 'active disabled' : ''}}" href="{{route('users.index',['uloga'=>'frizer'])}}">Frizeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{$uloga == 'klijent' ? 'active disabled' : ''}} " href="{{route('users.index',['uloga'=>'klijent'])}}">Klijenti</a>
                </li>
            </ul>
    </div>
    <div class="row justify-content-center mt-3">
                <div style="background-color: #D9D9D9" class="col-9 p-4">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Ime</th>
                        <th>Prezime</th>
                        <th>Broj telefona</th>
                        <th>Username</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->ime}}</td>
                                <td>{{$user->prezime}}</td>
                                <td>{{$user->broj_telefona}}</td>
                                <td>{{$user->username}}</td>
                                <td>
                                    <form action="{{route('users.destroy',['user'=>$user])}}" method="POST" onsubmit="return confirm('Da li ste sigurni da želite da obrišete korisnika?')" >
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger font-weight-bold" >
                                                Obriši
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
           
                </div>

    </div>


@endsection

