@extends('layouts.base')
@section('body-content')
    <table class="table">
        <tr>
            <th>Numéro</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>Commission</th>
            <th></th>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{$item->no_chauffeur}}</td>
                <td>{{$item->prenom}}</td>
                <td>{{$item->nom}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->telephone}}</td>
                <td>{{$item->commission}}</td>
                <td><a class="btn btn-warning" href="{{route('modifyConductor',['id'=>$item->id_chauffeur])}}">Modifier</a></td>
            </tr>

        @endforeach
    </table>
@endsection
