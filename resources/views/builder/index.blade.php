@include('layouts.header-backoffice')

@foreach ($builders as $key => $page)
<div class="container-page">
    <p>{{$page->nom}}</p>
    <a href="{{ route('builder.edit', $page->id) }}" class="editer">Editer</a>
    <a href="/" class="ajouter">Voir la page {{$page->nom}}</a>
</div>
@endforeach