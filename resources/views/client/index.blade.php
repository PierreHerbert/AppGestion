@include('layouts.header-backoffice')

<main id="clients">
    <a href="{{ route('client.create')}}" class='ajouter'>Ajouter un Client</a>

    <section class="container-operations">
        @foreach ($clients as $key => $client)
            <div class="container-operation">
                    <p>{{$client->appellation}}</p>
                    <p class="client-nom">{{$client->nom}}</p>
                    <p class="client-prenom">{{$client->prenom}}</p>
                    
                    <a href="{{ route('client.show', $client->id) }}" class="ajouter">+ d'info</a>
                    <a href="{{ route('client.edit', $client->id) }}" class="editer">Editer</a>
                                
                    <div class="modal">
                        <p>Êtes vous sur de vouloir supprimer ce client ?</p>
                        <div class="reponse">
                            <span class="retour non">Non</span>
                            <form action="{{ route('client.destroy' ,$client->id) }}" method="POST" accept-charset="UTF-8">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger btn-sm" type="submit" value="">Oui</button>
                            </form> 
                        </div>
                        
                    </div>
                        
                    <span class="supprimer">Supprimer</span>
            </div>
        @endforeach
        <div id="background-modal"></div>
    </section>
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