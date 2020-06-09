@extends('layouts.base')

@section('title',"Liste des rôles des utilisateurs")

@section('after-scripts')
    <script src="{{asset('js/listUsers.js')}}"></script>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/messageContainer.css') }}">
@endsection


@section('body-content')

    <div id="messageContainer">
        <!--<label class="success">Test</label>
        <label class="error">Test</label>
        <label class="warning">Test</label>-->
    </div>

    <div class="row pb-3">
        <h1 class="mx-auto"><u>Liste des rôles des utilisateurs</u></h1>
    </div>
    <div class="container">
        <table id="listUsers" class="display table table-bordered table-striped pb-5">
            <thead>
                <tr>
                    <th class="th-sm">ID</th>
                    <th class="th-sm">Nom</th>
                    <th class="th-sm">Courriel</th>
                    <th class="th-sm">Rôle</th>
                    <th class="border-0"></th>
                </tr>
            </thead>
            <tbody>@foreach($users as $user)
                <tr>
                    <td>{{$user->id}}@if(\Illuminate\Support\Facades\Auth::id() == $user->id) <b>(C'est vous)</b>@endif</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <form id="changeForm-{{$user->id}}" type="post" action="{{route('changeUser',['id'=>$user->id])}}">
                            @csrf
                            <label for="role-{{$user->id}}" hidden></label>@php($currentRole = $user->role??'none')
                            <select id="role-{{$user->id}}" class="form-control" name="role-{{$user->id}}">
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
            @endforeach</tbody>
            <tfoot>
                <tr>
                    <th class="th-sm">ID</th>
                    <th class="th-sm">Nom</th>
                    <th class="th-sm">Courriel</th>
                    <th class="th-sm">Rôle</th>
                    <th class="border-0"></th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
