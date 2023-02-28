@include('layouts.header-backoffice')

<main id="clients">
    <section>
        <div class="container-client">

       
       <p> {{$client->appellation}}
        {{$client->nom}}
        {{$client->prenom}} </p>
    </div>
        @foreach($operations as $key => $operation)
        <div class="container-ope">
            <p>{{ $operation->nature }} {{$client->appellation}} {{$client->nom}} {{$client->prenom}}</p>
            <p>{{ $operation->montant }}</p>
            @foreach($categorie_operations as $key => $categorie_operation)
                @if($categorie_operation->id == $operation->categorie_operation_id)
                    <p>{{ $categorie_operation->nom }}</p>
                @endif
            @endforeach
        </div>
            
        @endforeach
    </section>
    <section>
        <a href="{{ route('client.index') }}" class="btn-background retour">Retour</a>
    </section>

</main>