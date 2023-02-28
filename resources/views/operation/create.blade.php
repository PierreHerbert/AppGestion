@include('layouts.header-backoffice')
<main>
    <section id="create">
        <div class="bg-light p-4 rounded">

            <div class="container mt-4">

                <form method="POST" action="{{ route('operation.store') }}" class="form">
                    <h1>Ajouter une opération</h1>
                    @csrf
                    <div class="container-name">
                        <div class="mb-3">
                            <input value="{{ old('name') }}" 
                                type="text" 
                                class="form-control" 
                                name="nature" 
                                placeholder="Nom de l'opération" required>

                            @if ($errors->has('name'))
                                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <span id='add_client'>Ajouter un Client +</span>
                        <div id="liste-clients">
                            <select name="client_id" id="liste_client">
                                <option value=""> </option>
                                @foreach ($clients as $key => $client)
                                    <option value="{{$client->id}}">{{$client->appellation}} {{$client->nom}} {{$client->prenom}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div>
                        <input value="{{ old('name') }}" 
                            type="text" 
                            class="form-control" 
                            name="montant" 
                            placeholder="montant de l'opération" required>

                        @if ($errors->has('name'))
                            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div>
                        <input value="{{ old('name') }}" 
                            type="date" 
                            class="form-control" 
                            name="date" 
                            required>

                        @if ($errors->has('name'))
                            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="container-radios">
                        <div class="container-radio">
                            <input type="radio" name="type_operation" id="choix_1" value="0"><label for="choix_1">Débit</label>
                        </div>
                        <div class="container-radio">
                            <input type="radio" name="type_operation" id="choix_2" value="1"><label for="choix_2">Crédit</label>
                        </div>
                    </div>
                    
                    <div>
                        <select name="categorie_operation" id="liste-categorie-operation">
                            @foreach ($categorie_operations as $key => $categorie_operation)
                                <option value="{{$categorie_operation->id}}">{{$categorie_operation->nom}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="btn-create">
                        <button type="submit" class="btn btn-primary">Ajouter l'operation</button>
                        <a href="{{ route('operation.index') }}" class="retour">Retour</a>
                    </div>
                </form>
            </div>

        </div>
    </section>
</main>
<script>
    button = document.getElementById('add_client');
    select = document.getElementById('liste-clients')
    button.addEventListener('click',event =>{
        select.classList.add('select_visible');
        button.classList.add('invisible');
    });
</script>
