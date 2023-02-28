@auth
    @include('layouts.header')
@endauth
@foreach($builders as $key => $page)
    @if($page->nom == 'index')
        {!! $page->content !!}
    @endif
@endforeach