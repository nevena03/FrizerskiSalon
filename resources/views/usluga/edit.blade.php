
@extends('layouts.app')

@section('content')
    <h1 style="color: #870F96;" class="text-center display-5 mt-4" >{{$usluga->naziv}}</h1>
    <div class="row justify-content-center mt-5">
            <div style="background-color: #D9D9D9; border-radius: 2px;" class="col-7 p-5">
                <form action="{{ route('uslugas.update', ['usluga' => $usluga]) }}" method="POST">
                    @csrf
                    @method('PUT')
                            <div class="form-group row justify-content-between">
                                <label  style="color: #870F96" for="naziv" class="form-check-label col-auto font-weight-bold text-right">Naziv:</label>
                                <input type="text" class="form-check-label col-9" name="naziv" value="{{$usluga->naziv}}">
                            </div>
                            <div class="form-group row justify-content-between">
                                <label  style="color: #870F96" for="cena" class="form-check-label col-auto font-weight-bold text-right">Cena:</label>
                                <input type="number" class="form-check-label col-9" name="cena" value="{{$usluga->cena}}">
                            </div>
                            <div class="row justify-content-around mt-5">
                                <button class="btn btn-custom" type="submit">Izmeni</button>
                                <a class="btn btn-danger" href="{{route('uslugas.index')}}">Nazad</a>
                            </div>

                </form>
            </div>
            
    
            
        </div>

@endsection

