
@extends('layouts.app')

@section('content')
    <h1 style="color: #870F96" class="text-center" >Novi termin</h1>
    @if($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach($errors->all() as $error)
                    <li style="font-size: medium" class="font-weight-bold" >
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row justify-content-center mt-5">
        <div style="background-color: #D9D9D9;" class="col-9 p-5">
            <form action="{{route('termins.store')}}" method="POST">
                @csrf
                <div class="row justify-content-around">
                    <div class="col-5">
                        <div class="form-group row">
                            <label  style="color: #870F96" for="datum" class="form-check-label col-2 font-weight-bold">Datum:</label>
                            <input type="date" class="form-check-label col-10" name="datum">
                        </div>
                        <div class="form-group row">
                            <label style="color: #870F96"  for="vreme" class="form-check-label col-2 font-weight-bold" >Vreme:</label>
                            <select name="vreme" class="col-10">
                                <option value="09:00:00">09:00</option>
                                <option value="09:30:00">09:30</option>
                                <option value="10:00:00">10:00</option>
                                <option value="10:30:00">10:30</option>
                                <option value="11:00:00">11:00</option>
                                <option value="11:30:00">11:30</option>
                                <option value="12:00:00">12:00</option>
                                <option value="12:30:00">12:30</option>
                                <option value="13:00:00">13:00</option>
                                <option value="13:30:00">13:30</option>
                                <option value="14:00:00">14:00</option>
                                <option value="14:30:00">14:30</option>
                                <option value="15:00:00">15:00</option>
                                <option value="15:30:00">15:30</option>
                                <option value="16:00:00">16:00</option>
                                <option value="16:30:00">16:30</option>
                                <option value="17:00:00">17:00</option>
                                <option value="17:30:00">17:30</option>
                                <option value="18:00:00">18:00</option>
                                <option value="18:30:00">18:30</option>
                                <option value="19:00:00">19:00</option>
                                <option value="19:30:00">19:30</option>
                                <option value="20:00:00">20:00</option>
                                <option value="20:30:00">20:30</option>
                                <option value="21:00:00">21:00</option>
                                <option value="21:30:00">21:30</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label  style="color: #870F96"  for="datum" class="form-check-label col-2 font-weight-bold" >Frizer:</label>
                            <select name="frizer_id" class="col-10" >
                                @foreach($frizeri as $frizer)
                                    <option value="{{$frizer->id}}">
                                        {{$frizer->ime}} {{$frizer->prezime}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row justify-content-around mt-5">
                            <button class="btn btn-custom" type="submit">Potvrdi</button>
                            <a class="btn btn-danger" href="{{route('termins.index')}}">Nazad</a>

                        </div>
                    </div>
                    <div class="col-5">
                        <h4 style="color: #870F96" class="ml-5 mb-3" >Usluge</h4>
                        @foreach($usluge as $usluga)
                        <div class="form-check d-flex justify-content-center">
                            
                            <label style="color:rgb(0, 0, 0)" class="form-check-label w-75">
                                <input type="checkbox" name="usluge[]" class="form-check-input me-2" value="{{$usluga->id}}">{{$usluga->naziv}} -  {{$usluga->cena}} RSD
                             </label>
                        </div>
                        @endforeach
                    </div>

                </div>
            </form>

        </div>
    </div>
@endsection
