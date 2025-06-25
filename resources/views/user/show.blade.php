
@extends('layouts.app')

@section('content')
    <h1 style="color: #870F96" class="text-center mt-2" >{{$user->ime}} {{$user->prezime}}</h1>
        <div class="row justify-content-center mt-3">
            <div style="background-color: #D9D9D9" class="col-9 p-4 mt-5">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Ime</th>
                                <th>Prezime</th>
                                <th>Telefon</th>
                                <th>Username</th>
                                <th>Ažuriranje profila</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$user->ime}}</td>
                                    <td>{{$user->prezime}}</td>
                                    <td>{{$user->broj_telefona}}</td>
                                    <td>{{$user->username}}</td>     
                                    <td>
                                        <a href="{{route('users.edit', ['user'=>$user])}}" class="btn btn-custom  font-weight-bold">Izmeni podatke</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
 
            </div>
    </div>
@endsection




