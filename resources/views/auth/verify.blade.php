@extends('layouts.base')
@section('title',"Vérification d'adresse courriel")


@section('body-content')
<div class="container mb-5">
    @parent
    <div class="row mb3 justify-content-center">
        <div class="col-8">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">Un nouveau lien de vérification a été envoyé à votre adresse courriel.</div>
            @endif
            Avant de continuer, veuillez vérifier votre courriel pour un lien de vérification.
            Si vous n'avez pas reçu le courriel
            <form class="d-inline" method="post" accept-charset="{{route('verification.resend')}}">
                @csrf
                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Appuyez ici pour recevoir un autre courriel</button>.
            </form>
        </div>
    </div>
</div>
@endsection
