@include('layouts.header-backoffice')
<main id="operations">
    <a href="{{ route('operation.create')}}" class="ajouter">Ajouter une opération</a>

    <section class="container-operations">
        @foreach ($operations as $key => $operation)
            <div class="container-operation"> 
                    <p>{{ $operation->date }}</p>
                    <p>{{ $operation->nature }}
                        @if($operation->client_id)
                            @foreach($clients as $key => $client)
                                @if($client->id == $operation->client_id)
                                    {{$client->appellation}} {{$client->nom}} {{$client->prenom}}
                                @endif
                            @endforeach
                        @endif
                    </p>
                    @foreach ($categorie_operations as $key => $categorie_operation)
                            @if($categorie_operation->id === $operation->categorie_operation_id)
                                <p>{{$categorie_operation->nom}}</p>
                            @endif
                    @endforeach
                    <p>{{$operation->montant}}€</p>
                    
                    <a href="{{ route('operation.edit', $operation->id) }}" class="editer">Editer</a>
                    <div class="modal">
                        <p>Êtes vous sur de vouloir supprimer cette opération ?</p>
                        <div class="reponse">
                            <span class="retour non">Non</span>
                            <form action="{{ route('operation.destroy' ,$operation->id) }}" method="POST" accept-charset="UTF-8">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger btn-sm" type="submit" value="">Oui</button>
                            </form> 
                        </div>
                        
                    </div>
                        
                    <span class="supprimer">Supprimer</span>
            </div>
        @endforeach
    </section>
    
<div id="background-modal"></div>
</main>
<script>
    background = document.getElementById('background-modal');
    modals = document.getElementsByClassName('modal');
    boutonsupprimer = document.getElementsByClassName('supprimer');
    boutonnon = document.getElementsByClassName('non');

    for(let i = 0; i < boutonsupprimer.length ; i++ ){
        boutonsupprimer[i].addEventListener('click' , event =>{
            modals[i].style.display = 'block';
            background.style.display ='block';
        });
    }

    background.addEventListener('click' , event =>{
        for(let i = 0; i < modals.length ; i++ ){
            modals[i].style.display = 'none';
        }
        background.style.display = 'none';
    });

    for(let i = 0; i < boutonnon.length ; i++ ){
        boutonnon[i].addEventListener('click' , event =>{
            modals[i].style.display = 'none';
            background.style.display ='none';
        });
    }
    
    document.onkeydown = function(evt) {
    evt = evt || window.event;
    if (evt.keyCode == 27) {
        for(let i = 0; i < modals.length ; i++ ){
            modals[i].style.display = 'none';
        }
        background.style.display = 'none';
    }
    };
    
</script>