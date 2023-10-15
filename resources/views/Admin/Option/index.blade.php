@extends('Admin.baseAdmin')

@section ('title', 'Administration')

@section ('content')
    <div class="d-flex align-items-center justify-content-between">
        <h1>Liste des options</h1>
        <a href="{{ route('admin.option.create')}}" class="btn btn-primary">Ajouter une option</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            {{$options}}
            @foreach ($options as $k => $option)
                <tr>
                    <td> {{ $k+1}}</td>
                    <td> {{ $option->name}}</td>
                    <td class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('admin.option.edit', $option)}}" class="btn btn-primary">Editer</a>
                            <form action=" {{ route('admin.option.destroy', $option)}}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger">Supprimer</button>
                            </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $options->links()}}
@endsection