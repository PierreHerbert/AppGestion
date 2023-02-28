@include('layouts.header-backoffice')

<a href="{{ route('type_operation.create')}}">Ajouter un type d'opération</a>


@foreach ($type_operations as $key => $type_operation)
            <p>{{$type_operation->nom}}</p>
            <a href="{{ route('type_operation.edit', $type_operation->id) }}" class="btn btn-info btn-sm">Editer</a>
                        
            <form action="{{ route('type_operation.destroy' ,$type_operation->id) }}" method="POST" accept-charset="UTF-8">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger btn-sm" type="submit" value="">Supprimer</button>
            </form>

@endforeach