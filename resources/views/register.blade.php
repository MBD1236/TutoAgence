@extends('baseUser')

@section('title', 'Créer un compte')

@section('content')

    <div class="container">
        <h1>@yield('title')</h1>

        <form action="{{ route('formUser')}}" method="post" class="vstack gap-1">
            @csrf
            @include('shared.input', ['type' => 'text', 'class' => 'form-control', 'name' => 'name', 'label' => 'Nom'])
            @include('shared.input', ['type' => 'email', 'class' => 'form-control', 'name' => 'email', 'label' => 'Email'])
            @include('shared.input', ['type' => 'password', 'class' => 'form-control', 'name' => 'password', 'label' => 'Mot de passe'])
            <div>
                    <button type="submit" class="btn btn-primary">créer</button>
            </div>
        </form>
    </div>
    
@endsection