@extends('layouts.base')

@section('title',"Liste des rôles des utilisateurs")

@section('after-scripts')
    <script src="{{asset('js/listUsers.js')}}"></script>
@endsection


@section('body-content')

    <div class="row pb-3">
        <h1 class="mx-auto"><u>Liste des rôles des utilisateurs</u></h1>
    </div>
    <table class="container table table-bordered pb-5 border-right-0 border-bottom-0">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Courriel</th>
            <th>Rôle</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <form id="changeForm-{{$user->id}}" type="post" action="{{route('listUsers')}}" class="changeForm">
                        <label for="role-{{$user->id}}" hidden></label>@php($currentRole = $user->role??'none')
                        <select id="role-{{$user->id}}" class="form-control" name="role-{{$user->id}}" class="role">
                            <option value="none" disabled{{$currentRole=='none'?" selected":""}}>Veuillez choisir un rôle</option>
                            <option value="client"{{$currentRole=='client'?" selected":""}}>Client</option>
                            <option value="conductor"{{$currentRole=='conductor'?" selected":""}}>Conducteur</option>
                            <option value="admin"{{$currentRole=='admin'?" selected":""}}>Administrateur</option>
                        </select>
                    </form>
                </td>
                <td class="border-0">
                    <button class="mx-auto btn btn-outline-success" onclick="changeRole({{$user->id}})">Appliquer</button>
                </td>
            </tr>
        @endforeach
    </table>



@endsection
