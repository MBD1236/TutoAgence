@extends('baseUser')
@section('title', 'Tous nos biens')

@section('content')
    
    <div class="bg-light p-3 my-3">
        <form action="" method="get" class="container d-flex gap-2">
            <input type="number" class="form-control" placeholder="Budget max" name="price" value="{{ $input['price'] ?? ''}}">
            <input type="number" class="form-control" placeholder="Surface minimale" name="surface" value="{{ $input['surface'] ?? ''}}">
            <input type="number" class=" form-control" placeholder="Nombre de pièces minimum" name="rooms" value="{{ $input['rooms'] ?? ''}}">
            <input type="text" class="form-control" placeholder="Mot clé" name="title" value="{{ $input['title'] ?? '' }}">
            <button class="btn btn-primary btn-sm">Rechercher</button>
        </form>
    </div>

    <div class="container">
        <div class="row">
            @forelse ($properties as $property)
                <div class="col-3">
                    @include('property.card')
                </div>
            @empty
                <div class="col text-center text-bg-info">
                    Aucun bien ne correspond à votre recherche
                </div>
            @endforelse 
           
            
        </div>




        <div class="my-4">
            {{ $properties->links()}}
        </div>
    </div>
@endsection