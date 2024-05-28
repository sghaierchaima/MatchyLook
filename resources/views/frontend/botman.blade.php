@extends('layouts.menu')
    @section('content')
    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <div class="container-fluid">
    <!-- ***** Main Banner Area End ***** -->


   <style>
    body {
  background-image: url('assets\images\wal.png');
  background-size: cover;
  background-repeat: no-repeat;
}
    .vdc {
            
        position: fixed;
        right:150px;
        left: 150px;
        bottom: 0;
        width: 55%;
        height: 100%;
        z-index: -1000;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        margin-top: 5500px; 
    }
</style>
       
    <div class="wrapper" style="background-image: url('assets/images/bg-registration-form-1.jpg');">
            <div class="inner">
                
                    <video autoplay loop class="">
                        <source src="assets\images\video\ch.mp4" type="video/mp4"></div>
                    </video>
                </div>
                
            
       
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">
        
        
    
        <script>
            var botmanWidget = {
                aboutText: 'Commencez la conversation avec bonjour ou hi ',
                introMessage: "Bienvenue chez MatchyLook, je suis votre assistante MatchyBot"
            };
        </script>
       
       <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
       
        </div>     
@endsection                  

<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{url('masterr')}}" class="logo">
                    <a href="{{route('master')}}" class="logo">
                        <img src="assets/images/OL.jpg">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="{{url('masterr')}}" class="active">Accueil</a></li>
                       <!-- <li class="scroll-to-section"><a href="{{route('master')}}" class="active">Accueil</a></li>-->
                        <li class="scroll-to-section"><a href="{{route('all')}}">Homme</a></li>
                        <li class="scroll-to-section"><a href="{{url('femme')}}">Femme</a></li>

                       
                        
                        <
                        <li class="scroll-to-section"><a href="{{route('connexion')}}">Connexion</a></li>
                        <li class="scroll-to-section"><a href="{{route('avatarT')}}">Avatar</a></li>
                        <li class="scroll-to-section"><a href="{{route('botman1')}}">MatchyBot</a></li>

                        <li class="scroll-to-section"><a href="{{route('about')}}">a propos</a></li>

                    </ul>        
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
    <body>
        <div class="scroll-text">

       <span>MatchyBot</span>
        </div>
   
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">
    <script>
        var botmanWidget = {
            aboutText: 'Commencez la conversation avec bonjour ou hi ',
            introMessage: "Bienvenue chez MatchyLook, je suis votre assistante MatchyBot"
        };
    </script>
   
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>

    <script>
        // Récupérer la référence à l'élément <body>
const body = document.querySelector('body');

// Modifier le contenu HTML du <body>
body.innerHTML = 'Nouveau contenu pour le <body>';

// Ou vous pouvez ajouter du contenu supplémentaire
body.innerHTML += '<p>Paragraphe ajouté au <body></p>';

    </script>
</body>
</html>
 