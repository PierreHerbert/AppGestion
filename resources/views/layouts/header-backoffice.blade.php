<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @vite(['resources/sass/app.scss'])
    <meta name="csrf-token" content="{{ csrf_token() }}"></head>

<body id="back_body">
    <header id="back">
        <img src="{{ asset('images/menu_icon.png') }}" alt="" id="icon_menu">
        <nav>
            <ul id="menu" class=''>
                <li><a href="{{ route('categorie_operation.index') }}"><img src="{{ asset('images/operation_categorie.png') }}" alt=""></a></li>
                <li><a href="{{ route('operation.index') }}"><img src="{{ asset('images/operation.png') }}" alt=""></a></li>
                <li><a href="{{ route('client.index') }}"><img src="{{ asset('images/client.png') }}" alt=""></a></li>
                <li><a href="{{ route('dashboard') }}"><img src="{{ asset('images/dashboard.png') }}" alt=""></a></li>
                <li><a href="{{ route('builder.index') }}"><img src="{{ asset('images/pager.png') }}" alt=""></a></li>
            </ul>
        </nav>
    </header>
    <div id="logout">
        <a href="{{ route('logout.perform') }}"> Déconnexion</a>
    </div>
<script>
    icon_menu = document.getElementById('icon_menu');
menu = document.getElementById('menu');

icon_menu.addEventListener('click', event => {
    menu.classList.toggle('visible');
  });
</script>
