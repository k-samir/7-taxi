@extends('layouts.base')

@section('body-content')
    <table class="table">
        <tr>
            <th>Numéro</th>
            <th>Immatriculation </th>
            <th>assurance</th>
            <th>date de circulation</th>
            <th></th>
        </tr>
        @foreach ($taxis as $taxi)
            <tr>
                <td>{{$taxi->no_taxi}}</td>
                <td>{{$taxi->plaque_immatriculation}}</td>
                <td>{{$taxi->no_assurance}}</td>
                <td>{{$taxi->date_debut_circulation}}</td>
                <td> <a href="{{route('modifyTaxi',['id'=>$taxi->id_taxi])}}"> modifier</a> </td>
            </tr>
                        
        @endforeach
    </table>    
@endsection
