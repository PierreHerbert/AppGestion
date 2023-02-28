@include('layouts.header-backoffice')

<main id='categorie'>
    <a href="{{ route('categorie_operation.create')}}" class="ajouter">Ajouter une catégorie d'opération</a>

    <section class="container-operations">
        @foreach ($categorie_operations as $key => $categorie_operation)
                <div class="container-operation">

                    <p>{{ $categorie_operation->nom}}</p>
                    
                    <a href="{{ route('categorie_operation.edit', $categorie_operation->id) }}" class="editer">Editer</a>
                                
                    <div class="modal">
                        <p>Êtes vous sur de vouloir supprimer la categorie ?</p>
                        <div class="reponse">
                            <span class="retour non">Non</span>
                            <form action="{{ route('categorie_operation.destroy' ,$categorie_operation->id) }}" method="POST" accept-charset="UTF-8">
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