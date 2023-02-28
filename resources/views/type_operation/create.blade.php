@include('layouts.header-backoffice')

<section>
    <div class="bg-light p-4 rounded">

        <div class="container mt-4">

            <form method="POST" action="{{ route('type_operation.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input value="{{ old('name') }}" 
                        type="text" 
                        class="form-control" 
                        name="nom" 
                        placeholder="nom du type de d'opération" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="btn-create">
                    <button type="submit" class="btn btn-primary">Ajouter le type d'operation</button>
                    <a href="{{ route('type_operation.index') }}" class="btn btn-default">Retour</a>
                </div>
            </form>
        </div>

    </div>
</section>