
@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <h1 class="text-center">Računi</h1>
     <div class="row justify-content-center mt-3">
                <div style="background-color: #D9D9D9" class="col-9 p-4">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Ukupna cena</th>
                        <th>Način plaćanja</th>
                        <th>Datum izdavanja</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($racuns as $racun)
                            <tr>
                                <td>{{$racun->ukupna_cena}}</td>
                                <td>{{$racun->nacin_placanja}}</td>
                                <td>{{$racun->datum_izdavanja->format('d.m.Y.')}}</td>
                                <td>
                                    <a href="{{route('racuns.show',['racun'=>$racun])}}"class="btn btn-custom">Detaljnije</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>

                </div>

            </div>

</div>
    
@endsection

