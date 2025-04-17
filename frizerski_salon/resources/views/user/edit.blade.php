@extends('layouts.app')

@section('content')
    <h1 style="color: #870F96" class="text-center mt-2" >{{$user->ime}} {{$user->prezime}}</h1>
        @if($errors->any())
            <div class="alert alert-danger font-weight-bold text-center">
                @foreach($errors->all() as $error)
                    {{$error}}
                    <br>
                @endforeach

            </div>
        @endif
        <div class="row justify-content-center mt-5">
            <div style="background-color: #D9D9D9; border-radius: 2px;" class="col-7 p-5">
                <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                            <div class="form-group row justify-content-between">
                                <label  style="color: #870F96" for="ime" class="form-check-label col-auto font-weight-bold text-right">Ime:</label>
                                <input type="text" class="form-check-label col-9" name="ime" value="{{$user->ime}}">
                            </div>
                            <div class="form-group row justify-content-between">
                                <label  style="color: #870F96" for="prezime" class="form-check-label col-auto font-weight-bold text-right">Prezime:</label>
                                <input type="text" class="form-check-label col-9" name="prezime" value="{{$user->prezime}}" >
                            </div>
                            <div class="form-group row justify-content-between">
                                <label  style="color: #870F96" for="broj_telefona" class="form-check-label col-auto font-weight-bold text-right">Broj telefona:</label>
                                <input type="text" class="form-check-label col-9" name="broj_telefona" value="{{$user->broj_telefona}}" >
                            </div>
                            <div class="form-group row justify-content-between">
                                <label  style="color: #870F96" for="username" class="form-check-label col-auto font-weight-bold text-right">Username:</label>
                                <input type="username" class="form-check-label col-9" name="username" value="{{$user->username}}" >
                            </div>
                            <div class="form-group row justify-content-between">
                                <label  style="color: #870F96" for="password" class="form-check-label col-auto font-weight-bold text-right">Stara lozinka:</label>
                                <input type="password" class="form-check-label col-9" name="old_password">
                            </div>
                            <div class="form-group row justify-content-between">
                                <label  style="color: #870F96" for="password" class="form-check-label col-auto font-weight-bold text-right">Nova lozinka:</label>
                                <input type="password" class="form-check-label col-9" name="password">
                            </div>
                            <div class="form-group row justify-content-between">
                                <label  style="color: #870F96;" for="password" class="form-check-label col-auto font-weight-bold text-right">Potvrdi lozinku:</label>
                                <input type="password" class="form-check-label col-9" name="password_confirmation">
                            </div>
                            <div class="row justify-content-around mt-5">
                                <button class="btn btn-custom" type="submit">Izmeni</button>
                                <a class="btn btn-danger" href="{{route('users.show', ['user'=>$user])}}">Nazad</a>
                            </div>

                </form>
            </div>
            
    
            
        </div>

@endsection

