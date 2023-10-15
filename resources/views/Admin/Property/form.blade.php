@extends('Admin.baseAdmin')

@section('title', $property->id ? "Editer un bien" : "Création d'un bien")

@section('content')
    <h1>@yield('title')</h1>
    <form action="{{ $property->id ? route('admin.property.update', $property) : route('admin.property.store')}}" method="post" class="vstack gap-2">
    @method($property->id ? "put" : "post")
    @csrf
    <div class="row">
        @include('shared.input', ['name' => 'title', 'label' => 'Titre', 'class' => 'form-control', 'value' => $property->title])
        <div class="row col">
            @include('shared.input', ['name' => 'price', 'label' => 'Prix', 'class' => 'form-control', 'value' => $property->price])
            @include('shared.input', ['name' => 'surface', 'label' => 'Surface', 'class' => 'form-control', 'value' => $property->surface])
        </div>
    </div>
    @include('shared.input', ['type' => 'textarea','name' => 'description', 'label' => 'Description', 'class' => 'form-control', 'value' => $property->description])
    <div class="row">
        @include('shared.input', ['name' => 'rooms', 'label' => 'Pièce', 'class' => 'form-control', 'value' => $property->rooms])
        @include('shared.input', ['name' => 'bedrooms', 'label' => 'Chambre', 'class' => 'form-control', 'value' => $property->bedrooms])
        @include('shared.input', ['name' => 'floor', 'label' => 'Etage', 'class' => 'form-control', 'value' => $property->floor])
    </div>
    <div class="row">
        @include('shared.input', ['name' => 'address', 'label' => 'Adresse', 'class' => 'form-control', 'value' => $property->address])
        @include('shared.input', ['name' => 'city', 'label' => 'Ville', 'class' => 'form-control', 'value' => $property->city])
        @include('shared.input', ['name' => 'postal_code', 'label' => 'Code postal', 'class' => 'form-control', 'value' => $property->postal_code])
    </div>
        @include('shared.input', ['inputForm' => 'checkbox', 'name' => 'sold', 'label' => 'Code postal', 'class' => 'form-control', 'value' => $property->sold])
        @include('shared.input', ['inputForm' => 'select', 'name' => 'options', 'label' => 'Options', 'class' => 'form-control', 'value' => $options])
    <div>
        <button type="submit" class="btn btn-primary">
            @if ($property->id)
                Editer
            @else
                Créer
            @endif
        </button>
    </div>
    </form>
@endsection