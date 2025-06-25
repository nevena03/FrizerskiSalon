
@extends('layouts.app')

@section('content')
<h1 style="color: #870F96;" class="text-center display-5 mt-4" >Nova usluga</h1>
    <div class="row justify-content-center mt-5">
            <div style="background-color: #D9D9D9; border-radius: 2px;" class="col-7 p-5">
                <form action="{{ route('uslugas.store') }}" method="POST">
                    @csrf
                            <div class="form-group row justify-content-between">
                                <label  style="color: #870F96" for="naziv" class="form-check-label col-auto font-weight-bold text-right">Naziv:</label>
                                <input type="text" class="form-check-label col-9" name="naziv">
                            </div>
                            <div class="form-group row justify-content-between">
                                <label  style="color: #870F96" for="cena" class="form-check-label col-auto font-weight-bold text-right">Cena:</label>
                                <input type="number" class="form-check-label col-9" name="cena">
                            </div>
                            <div class="row justify-content-around mt-5">
                                <button class="btn btn-custom" type="submit">Dodaj</button>
                                <a class="btn btn-danger" href="{{route('uslugas.index')}}">Nazad</a>
                            </div>

                </form>
            </div>
            
    
            
        </div>
@endsection

