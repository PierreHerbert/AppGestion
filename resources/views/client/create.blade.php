@include('layouts.header-backoffice')

<section>
    <div class="bg-light p-4 rounded">

        <div class="container mt-4">

            <form method="POST" action="{{ route('client.store') }}" class="form">
                <h1>AJOUTER UN CLIENT</h1>
                @csrf
                <div class="mb-3">
                    <input value="{{ old('name') }}" 
                        type="text" 
                        class="form-control Nom" 
                        name="nom" 
                        placeholder="nom du client" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <input value="{{ old('name') }}" 
                        type="text" 
                        class="form-control Prenom" 
                        name="prenom" 
                        placeholder="prenom du client" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="container-radios">
                    <div class="container-radio">
                        <input type="radio" name="appellation" id="appellation_1" value="Mr"><label for="appellation_1">Mr</label>
                    </div>
                    <div class="container-radio">
                        <input type="radio" name="appellation" id="appellation_2" value="Mme"><label for="appellation_2">Mme</label>
                    </div>
                    <div class="container-radio">
                        <input type="radio" name="appellation" id="appellation_3" value="Mlle"><label for="appellation_3">Mlle</label>
                    </div>
                </div>

                <div class="btn-create">
                    <button type="submit" class="btn btn-primary">Ajouter le client</button>
                    <a href="{{ route('client.index') }}" class="retour">Retour</a>
                </div>
            </form>
        </div>

    </div>
</section>