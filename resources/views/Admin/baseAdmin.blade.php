<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav me-auto mb-2 mb-lg-0">
                <a  class="nav-link" aria-current="page" href="{{ route('admin.property.index')}}">Gérer les biens</a>
                <a class="nav-link" href="{{ route('admin.option.index')}}">Gérer les options</a>
            </div>
        </div>

        <div class="ms-auto">
            @auth
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <form action="{{ route('logout')}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="nav-link">Se déconnecter</button>
                        </form>
                    </li>
                </ul>
            @endauth
        </div>
    </div>
</nav>
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    @if ($errors->any() )
        @foreach ($errors->all() as $err)
            <li>{{ $err}}</li>
        @endforeach
    @endif
        @yield('content')
</div>
</body>
</html>
