<!DOCTYPE html>
<html lang="en">

  <head>    

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Matchy Look</title>


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
  }</style><!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
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
                                    <li><a href="{{route('pantalonHomme')}}">Pantallon</a></li>
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

   

<div class="content">
    @yield('content')

</div>
<body>
    
</body>

</html>