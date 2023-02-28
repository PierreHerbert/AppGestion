@include('layouts.header-backoffice')



<main>
    <section>
        <div class="bg-light p-4 rounded">

            <div class="container mt-4">

                <form method="POST" action="{{ route('operation.update', $operation->id) }}" class="form">
                    <h1>Ajouter une opération</h1>
                    @csrf
                    <div class="container-name">
                        <div class="mb-3">
                            <input value="{{ $operation->nature }}" 
                                type="text" 
                                class="form-control" 
                                name="nature" 
                                placeholder="Nom de l'opération" required>

                            @if ($errors->has('name'))
                                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        @if($operation->client_id)
                            <div class="liste-client">
                                <select name="client_id" id="liste-client-edit">
                                    @foreach ($clients as $key => $client)
                                        @if($operation->client_id == $client->id)
                                            <option selected value="{{$client->id}}">{{$client->appellation}} {{$client->nom}} {{$client->prenom}}</option>
                                        @else
                                            <option value="{{$client->id}}">{{$client->appellation}} {{$client->nom}} {{$client->prenom}}</option>
                                        @endif
                                    @endforeach
                                    <option id='no_client' value=""> </option>
                                </select>
                                <span id="remove_client">Supprimer</span>
                            </div>
                            <script>
                                    enlever = document.getElementById('remove_client');
                                    console.log( document.getElementById('no_client'));
                                    enlever.addEventListener('click',event =>{
                                        enlever.style.display = 'none';
                                        document.getElementById('liste-client-edit').style.display = 'none';
                                        document.getElementById('no_client').selected = true;
                                    });
                            </script>
                        @else
                            <span id='add_client'>Ajouter un Client</span>
                            <div class="liste-client">
                                <select name="client_id" id="liste-client">
                                    <option value=""> </option>
                                    @foreach ($clients as $key => $client)
                                        <option value="{{$client->id}}">{{$client->appellation}} {{$client->nom}} {{$client->prenom}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <script>
                                button = document.getElementById('add_client');
                                select = document.getElementById('liste-client');
                                
                                button.addEventListener('click',event =>{
                                    select.classList.add('select_visible');
                                    button.classList.add('invisible');
                                });

                            </script>
                        @endif
                    </div>
                    <div>
                        <input value="{{ $operation->montant }}" 
                            type="text" 
                            class="form-control" 
                            name="montant" 
                            placeholder="montant de l'opération" required>

                        @if ($errors->has('name'))
                            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div>
                        <input value="{{ $operation->date }}" 
                            type="date" 
                            class="form-control" 
                            name="date" 
                            required>

                        @if ($errors->has('name'))
                            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="container-radios">
                        @if($operation->type_operation == 0)
                            <div class="container-radio">
                                <input type="radio" name="type_operation" id="choix_1" value="0" checked><label for="choix_1">Débit</label>
                            </div>
                            
                            <div class="container-radio">
                                <input type="radio" name="type_operation" id="choix_2" value="1"><label for="choix_2">Crédit</label>
                            </div>
                        @else
                            <div class="container-radio">
                                <input type="radio" name="type_operation" id="choix_1" value="0"><label for="choix_1">Débit</label>
                            </div>
                            <div class="container-radio">
                                <input type="radio" name="type_operation" id="choix_2" value="1" checked><label for="choix_2">Crédit</label>
                            </div>
                        @endif
                    </div>
                    
                    <div>
                        <select name="categorie_operation" id="liste-categorie-operation">
                            @foreach ($categorie_operations as $key => $categorie_operation)
                                @if($operation->categorie_operation_id == $categorie_operation->id)
                                    <option selected value="{{$categorie_operation->id}}">{{$categorie_operation->nom}}</option>
                                @else
                                    <option value="{{$categorie_operation->id}}">{{$categorie_operation->nom}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="btn-create">
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        <a href="{{ route('operation.index') }}" class="retour">Retour</a>
                    </div>
                </form>
            </div>

        </div>
    </section>
</main>

