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
                            <li class="scroll-to-section"><a href="{{route('master')}}" class="active">Accueil</a></li>
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
                                <a href="javascript:;">Collection</a>
                                <ul>
                                    <li><a href="{{route('hiver')}}">Collection Hiver</a></li>
                                    <li><a href="#">Collection Printemps</a></li>
                                    <li><a href="#">Collection Automne</a></li>
                                    <li><a href="#">Collection d'Été </a></li>
                                </ul>
                            </li>
                            <li class="scroll-to-section"><a href="{{route('connexion')}}">Connexion</a></li>
                            <li class="scroll-to-section"><a href="{{route('about')}}">a propos</a></li>
                            <li class="scroll-to-section"><a href="{{route('avatarT')}}">Avatar</a></li>

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









<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="first-item">
                    <div class="logo">
                    <img src="assets/images/OL.jpg">
                    </div>
                    <ul>
                        <!-- <li><a href="#">16501 Collins Ave, Sunny Isles Beach, FL 33160, États-Unis</a></li> -->
                       <!--  <li><a href="#">hexashop@company.com</a></li>
                        <li><a href="#">010-020-0340</a></li> -->
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <h4>Achats &amp; Catégories</h4>
                <ul>
                    <li><a href="#">Achats pour hommes</a></li>
                    <li><a href="#">Achats pour femmes</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h4>Liens utiles</h4>
                <ul>
                    <li><a href="#">Page d'accueil</a></li>
                    <li><a href="#">À propos de nous</a></li>
                   
                </ul>
            </div>
            <div class="col-lg-3">
            <h4>Contacter nous</h4>
                <ul>
                    <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> MatchyLook@gmail.com</a></li>
                    <li><a href="#"><i class="fa fa-linkedin"> Matchy Look</i></a></li>
                   
                </ul>
            </div>
            
            
            <div class="col-lg-12">
                <div class="under-footer">
                    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 

                   
                    <!--<ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>

                    </ul>-->
                    <dotlottie-player src="https://lottie.host/3333dc79-e7b7-4704-a62e-47e1b15bee0e/9Ss40EQIXc.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></dotlottie-player>
                    <p>Droits d'auteur © 2024.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ***** Fin du pied de page ***** -->
    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>

  </body>

</html>
