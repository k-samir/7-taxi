@extends('layouts.base')
@section('title', "Inscription")

@section('body-content')

<form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="container-fluid">
            <div class="row mh-100vh">
                <div class="col-10 col-sm-8 col-md-6 col-lg-6 offset-1 offset-sm-2 offset-md-3 offset-lg-0 align-self-center d-lg-flex align-items-lg-center align-self-lg-stretch bg-white p-5 rounded rounded-lg-0 my-5 my-lg-0" id="login-block">
                    <class class="m-auto w-lg-75 w-xl-50">
                        <h2 class="text-info font-weight-light mb-5" style="font-family: 'Kaushan Script', cursive;color: rgb(254,209,54);font-size: 40px;">S'inscrire</h2>
                        <form>

                        
                        <div class="form-group"><label class="text-secondary">Nom</label> <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{old('name')}}" autofocus required></div>
                        <div class="col-6" hidden>
                    <span class="text-danger text-sm-right">@error('name'){{$message}}@enderror</span>
                </div>
                            <div class="form-group"><label class="text-secondary">Adresse Courriel</label><input id="email" class="form-control" type="email" name="email" value="{{old('email')}}" placeholder="email@template.com" autofocus></div>
                            <div class="w-100"></div>
                            <div class="col-6" hidden>
                                <span class="text-danger text-sm-right">@error('email'){{$message}}@enderror</span>
                            </div>

                          
                    <label class="text-secondary">Mot de passe</label>
                    <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" autofocus required>
                
                <div class="w-100"></div>
                <div class="col-6" hidden>
                    <span class="text-danger text-sm-right">@error('password'){{$message}}@enderror</span>
                </div>
                <div class="w-100 pb-4"></div>

               
                    <label class="text-secondary">Confirmer le mot de passe</label>
                    <input id="password-confirm" class="form-control" type="password" name="password_confirmation" autofocus required>
               
                <div class="w-100"></div>
                <div class="col-6" hidden>
                    <span class="text-danger text-sm-right">@error('password-confirm'){{$message}}@enderror</span>
                </div>

                <style>
                #radioBtn .notActive{
    color: #3276b1;
    background-color: #fff;
}</style>


<fieldset>
   
    <div class="toggle">
    
    <div id="radioBtn" class="btn-group">
     <h4>Vous êtes : </h4>

    <div style="margin-left:5px">

    <a class="btn btn-primary btn-sm active" data-toggle="type" data-title="CLIENT">CLIENT</a>
    					<a class="btn btn-primary btn-sm notActive" data-toggle="type" data-title="CHAUFFEUR">CHAUFFEUR</a>
                        
                        </div>
    				</div>

                        	<input type="hidden" name="type" id="type">

    </div>
</fieldset>



<button class="btn btn-info mt-2" type="submit">S'inscrire</button>

</form>
                      
                    </div>
              
                <div class="col-lg-6 d-flex align-items-end" id="bg-block" style="background-image: url(&quot;img/taxi_cars_traffic_146180_1920x1080.jpg&quot;);background-size: cover;background-position: center center;">
                    <p class="ml-auto small text-dark mb-2"><br></p>
                </div>
            </div>
        </div>

        <script>
        $('#radioBtn a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
})</script>
        @endsection
 