@include('layouts.header-backoffice')
<section>
    <div class="bg-light p-4 rounded">

        <div class="container mt-4">

            <form method="POST" action="{{ route('categorie_operation.update' , $categorie_operation->id) }}" class="form">
                @csrf
                <div class="mb-3">
                    <input value="{{ $categorie_operation->nom }}" 
                        type="text" 
                        class="form-control" 
                        name="nom" 
                        placeholder="nom de la catégorie de d'opération" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="btn-create">
                    <button type="submit" class="btn btn-primary">Ajouter le type d'operation</button>
                    <a href="{{ route('categorie_operation.index') }}" class="retour">Retour</a>
                </div>
            </form>
        </div>

    </div>
</section>