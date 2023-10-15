@extends('Admin.baseAdmin')

@section('title', $option->id ? "Editer une option" : "Création d'une option")

@section('content')
    <h1>@yield('title')</h1>
    <form action="{{ $option->id ? route('admin.option.update', $option) : route('admin.option.store')}}" method="post" class="vstack gap-2">
    @method($option->id ? "put" : "post")
    @csrf
     @include('admin.shared.input', ['name' => 'name', 'label' => 'Nom', 'class' => 'form-control', 'value' => $option->name])
    <div>
        <button type="submit" class="btn btn-primary">
            @if ($option->id)
                Editer
            @else
                Créer
            @endif
        </button>
    </div>
    </form>
@endsection