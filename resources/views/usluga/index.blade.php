
@extends('layouts.app')

@section('content')
<div class="row justify-content-end mr-5  mt-3">
        <a style="font-weight: bold;"  class="btn btn-success" href="{{route('uslugas.create')}}">Dodaj novu uslugu</a>
</div>
<h1 style="color: #870F96" class="text-center mt-2" >Usluge</h1>
        <div class="row justify-content-center mt-3">
            <div style="background-color: #D9D9D9" class="col-9 p-4 mt-5">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Naziv</th>
                                <th>Cena</th>
                                <th>Dodato od</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($uslugas as $usluga)
                                <tr>
                                    <td>{{$usluga->naziv}}</td>
                                    <td>{{$usluga->cena}} RSD </td>
                                    <td>{{$usluga->administrator->ime}} {{$usluga->administrator->prezime}} </td>
                                    <td class="row">
                                        <a class="btn btn-custom mr-5" href="{{route('uslugas.edit',['usluga'=>$usluga])}}">Izmeni</a>
                                        <form action="{{route('uslugas.destroy', ['usluga'=>$usluga])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Obriši</button>
                                        </form>
                                    </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
 
            </div>
    </div>
@endsection

