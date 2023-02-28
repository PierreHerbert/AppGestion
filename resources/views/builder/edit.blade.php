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
<script src="https://unpkg.com/grapesjs"></script>
<link rel="stylesheet" href="https://unpkg.com/grapesjs/dist/css/grapes.min.css">
        <script src="https://unpkg.com/grapesjs-preset-newsletter"></script>
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

<style>
            .editor-row {
            display: flex;
            justify-content: flex-start;
            align-items: stretch;
            flex-wrap: nowrap;
            height: 300px;
            }

            .editor-canvas {
            flex-grow: 1;
            }

            .panel__right {
            flex-basis: 230px;
            position: relative;
            overflow-y: auto;
            } 
            .panel__switcher {
            position: initial;
            }
            .panel__top {
            padding: 0;
            width: 100%;
            display: flex;
            position: initial;
            justify-content: center;
            justify-content: space-between;
            }
            .panel__basic-actions {
            position: initial;
            }
            .gjs-block {
            width: auto;
            height: auto;
            min-height: auto;
            }

            /* Reset some default styling */
            .gjs-cv-canvas {
            top: 0;
            width: 100%;
            height: 100%;
            }

            #gjs{height: 920px!important;margin-top: 25px;}
            .gjs-pn-devices-c {padding-left: 150px;}
            .gjs-frame{width: 85%;margin: 60px 15% 0 0;z-index: 55;}
       </style>

<div class="panel__top">
    <div class="panel__switcher"></div>
</div>
<div id="gjs">
  <h1>Hello World Component!</h1>
</div><div id="blocks"></div>
<div class="panel__right">
    <div class="layers-container"></div>
    <div class="styles-container"></div>
  </div>



  <form action="{{ route('builder.update', $builder->id) }}" id="Form-save" method="POST">
    @csrf
  </form>

<script>
const editor = grapesjs.init({
  // ...
  container: '#gjs',

  //plugin
  plugins: ['grapesjs-preset-newsletter'],
  pluginsOpts: { 'grapesjs-preset-newsletter': {
            // options
        }},



  // Get the content for the canvas directly from the element
  // As an alternative we could use: `components: '<h1>Hello World Component!</h1>'`,
  fromElement: true,
  // Size of the editor
  height: '300px',
  width: 'auto',
  assetManager:{
    storageType: '',
    storeOnChange:true,
    storeAfterUpload: true,
    upload: '${window.location.origin}/storage/images',
    assets: [],
    uploadFile: function(e){
        var files = e.dataTransfer ? e.dataTransfer.files : e.target.files;
        var formData = new FormData();
        for(var i in files){
            formData.append('files-' + i,files[i]);
        }

        $.ajax({
            url: '/builder/upload_image',
            type: 'POST',
            data : formData,
            contentType: false,
            crossDomain: true,
            dataType: 'json',
            mimeType: 'multipart/form-data',
            processData:false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            success: function(result){
                var myJSON = [];
                $.each(result['data'], function(key,value){
                    myJSON[key] = value;
                });
                
                var images = myJSON;
                console.log(editor);
                editor.AssetManager.add(images);          
            },

            error: function(xhr, ajaxOptions,thrownError){
                alert(xhr.responseText);
            },
        });
    }
  }
  
});

//AJOUT EN BDDD

//AJout d'une commande qui appele une commande qui récupere le html et css et l'envoie vers la fonction post
const commands = editor.Commands;
commands.add('get-all-html', editor => {
    htmlWithCss = editor.runCommand('gjs-get-inlined-html');
    console.log(htmlWithCss);
    post({content: htmlWithCss});
});

// Récupere le contenu en fonction de la page choisit
editor.setComponents( <?php echo json_encode($builder->content); ?> );


// Ajout d'un bouton pour sauvegarder
editor.Panels.addButton('options', [ { id: 'save', className: 'fa fa-floppy-o icon-blank', command: 'get-all-html', attributes: { title: 'Save Template' } }, ]);


//fonction POST qui va ajouter les donner dans un input type hidden et envoyer les données dans la bdd
    function post(params){
        const form = document.getElementById('Form-save');

        for(const key in params){
            if(params.hasOwnProperty(key)){
                const hiddenField = document.createElement('input');
                hiddenField.type = 'hidden';
                hiddenField.name = key;
                hiddenField.value = params[key];

                form.appendChild(hiddenField);
            }
        }

        document.body.appendChild(form);
        form.submit();
    }
</script>