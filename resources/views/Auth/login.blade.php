@extends('baseUser')

@section('title', 'Se connecter')

@section('content')

    <div class="container">
        <h1>@yield('title')</h1>

        <form action="{{ route('login')}}" method="post" class="vstack gap-1">
            @csrf
            @include('shared.input', ['type' => 'email', 'class' => 'form-control', 'name' => 'email', 'label' => 'Email'])
            @include('shared.input', ['type' => 'password', 'class' => 'form-control', 'name' => 'password', 'label' => 'Mot de passe'])

            <div class="d-flex justify-content-between mt-1">
                    <button class="btn btn-primary">Se connecter</button>
                    <div class="">
                        Vous n'avez pas de compte ?
                        <a href="{{ route('formUser')}}" style="text-decoration: none">Créer un compte</a>
                    </div>
            </div>
            <div class="d-flex">
                
            </div>
        </form>
    </div>
    
@endsection