@extends('Admin.baseAdmin')

@section ('title', 'Administration')

@section ('content')
    <div class="d-flex align-items-center justify-content-between">
        <h1>Liste des biens</h1>
        <a href="{{ route('admin.property.create')}}" class="btn btn-primary">Ajouter un bien</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Titre</th>
                <th>Surface</th>
                <th>Prix</th>
                <th>Ville</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($properties as $k => $property)
                <tr>
                    <td> {{ $k+1}}</td>
                    <td> {{ $property->title}}</td>
                    <td> {{ $property->surface}} m²</td>
                    <td> {{ number_format($property->price, thousands_separator: ' ') }} GNF</td>
                    <td> {{ $property->city}}</td>
                    <td class="d-flex gap-2 justify-content-end">
                        
                            <a href="{{ route('admin.property.edit', $property)}}" class="btn btn-primary">Editer</a>
                            <form action=" {{ route('admin.property.destroy', $property)}}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger">Supprimer</button>
                            </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $properties->links()}}
@endsection