<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MatchyLook Chatbot</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
    <link rel="stylesheet" href="assets/fontsr/material-design-iconic-font/css/material-design-iconic-font.min.css">
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="assets/css/registre.css">
<style>
dotlottie-player {
    width: 250px !important; /* nouvelle largeur */
  height: 250px !important;
    margin: auto; /* pour centrer l'élément horizontalement */
    display: block; /* pour centrer l'élément horizontalement */
  }</style>
    </head>
    <style>
    .scroll-text {
        background: #80f2e9;
        color: #333;
        font-size: 24px;
        position: relative; /* Position relative pour déplacer le texte */
        overflow: hidden; /* Masquer tout dépassement de texte */
        height: 50px; /* Hauteur du conteneur du texte */
        line-height: 50px; /* Hauteur de ligne égale à la hauteur du conteneur */
    }

    .scroll-text span {
        position: absolute; /* Position absolue pour déplacer le texte */
        width: auto; /* Largeur automatique */
        height: auto;
        margin: 0;
        padding: 0;
        right: 100%; /* Déplacer le texte à droite */
        animation: scroll 10s linear infinite; /* Animation de défilement */
    }

    @keyframes scroll {
        from {
            right: 100%; /* Début de l'animation : complètement à droite */
        }
        to {
            right: -100%; /* Fin de l'animation : complètement à gauche */
        }
    }
    
</style>
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
                        <li class="scroll-to-section"><a href="{{route('Femme')}}">Femme</a></li>

                        <!-- <li class="submenu">
                            <a href="{{route('all')}}">Homme</a>
                            <ul>
                                <li><a href="{{route('pullHomme')}}">Pulls&Polos</a></li>
                                <li><a href="{{url('pantalonHomme')}}">Pantallon</a></li>
                            </ul>
                        </li>
                        
<li class="submenu">
                            <a href="{{route('Femme')}}">Femme</a>
                            <ul>
                                <li><a href="{{route('femme_pull')}}">Pull </a></li>
                                <li><a href="{{route('femme_pantalon')}}">Pantallon</a></li>
                            </ul>
                        </li>                            <li class="submenu">

                        </li> -->
                        
                        <li class="submenu">
                            <a href="javascript:;">Accessoires</a>
                            <ul>
                                <li><a href="{{route('hiver')}}">Lunettes</a></li>
                                <li><a href="#"></a>Casquettes</li>
                                <li><a href="#">Collection Automne</a></li>
                                <li><a href="#">Collection d'Été </a></li>
                            </ul>
                        </li>
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
