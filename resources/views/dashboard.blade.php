@include('layouts.header-backoffice')
<main id="dashboard">
    <h1>Vos Opérations</h1>
    <section class="container-table">
        
        <table>
            <thead>
            <tr>
                <th>Date</th>
                <th>Nature</th>
                <th>Catégorie d'opération</th>
                <th>Débit</th>
                <th>Crédit</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($operations as $key => $operation)
            <tr>
                <td>{{ $operation->date }}</td>
                <td>{{ $operation->nature }}
                    @if($operation->client_id)
                        @foreach($clients as $key => $client)
                            @if($client->id == $operation->client_id)
                                {{$client->appellation}} {{$client->nom}} {{$client->prenom}}
                            @endif
                        @endforeach
                    @endif
                </td>
                <td>@foreach ($categorie_operations as $key => $categorie_operation)
                        @if($categorie_operation->id === $operation->categorie_operation_id)
                            <p>{{$categorie_operation->nom}}</p>
                        @endif
                    @endforeach 
                </td>
                <td>
                    @if($operation->type_operation == 0)
                        {{ $operation->montant }}€
                    @endif
                </td>
                <td>
                    @if($operation->type_operation == 1)
                        {{ $operation->montant }}€
                    @endif
                </td>
                <td><a href="{{ route('operation.edit', $operation->id) }}" class="editer">Editer</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </section>
    <section> 
        @php
            $MontantTotal = App\Http\Controllers\DashboardController::MontantTotal();
        @endphp
        <p id='total'>TOTAL : <span>{{ $MontantTotal }} €</span></p>
    </section>
</main>