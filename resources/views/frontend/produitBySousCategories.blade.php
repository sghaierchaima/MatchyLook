<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/css/templatemo-hexashop.css">
    <link rel="stylesheet" href="../assets/css/owl-carousel.css">
    <link rel="stylesheet" href="../assets/css/lightbox.css">
    <link rel="stylesheet" href="../assets/fontsr/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="../assets/css/registre.css">
    
</head>
<body>
    
    @extends('frontend.accueil')
    @section('accueil')

    <section class="section" id="products">
        <div class="container">
            <div class="row">
                @foreach($produits as $produit)
                <div class="col-lg-4">
                    <div class="item">
                        <div class="thumb">
                           
                            <img src="{{asset('assets/images')}}/{{$produit->image}}" alt="{{$produit->image}}" style style="width: 100%; height: 450;">
                        </div>
                        <div class="down-content">
                            <h4>{{$produit->nom}}</h4>
                            <span class="text-secondary text-xs font-weight-bold">{{$produit->couleur}}</span>
                            <span>Prix: {{ number_format($produit->prix, 2, ',', ' ') }} DT</span>
                            <p class="text-xs text-secondary mb-0">{{$produit->description}}</p>
                          
                            <ul class="stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
      
    </section>
    @endsection

    <script>
        function change(category) {
            // Récupérer tous les éléments de la liste
            var filterItems = document.querySelectorAll('#portfolio-flters li');
            // Parcourir tous les éléments et réinitialiser les classes et couleurs
            filterItems.forEach(function(item) {
                item.classList.remove('filter-active');
                var link = item.querySelector('.filter-link');
                if (link) {
                    link.style.color = 'black'; // Réinitialiser la couleur du lien à noir
                }
            });
            // Trouver l'élément cliqué par son ID
            var selectedElement = document.getElementById(category);
            // Ajouter la classe 'filter-active' à l'élément cliqué
            if (selectedElement) {
                selectedElement.classList.add('filter-active');
                var selectedLink = selectedElement.querySelector('.filter-link');
                if (selectedLink) {
                    selectedLink.style.color = 'black'; // Changer la couleur du lien à bleu
                }
            }
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var urlParams = new URLSearchParams(window.location.search);
            var selectedCategory = urlParams.get('selected');
            // Récupérer tous les éléments de la liste
            var filterItems = document.querySelectorAll('#portfolio-flters li');
            // Parcourir tous les éléments et réinitialiser les classes et couleurs
            filterItems.forEach(function(item) {
                item.classList.remove('filter-active');
                var link = item.querySelector('.filter-link');
                if (link) {
                    link.style.color = 'black'; // Réinitialiser la couleur du lien à noir
                }
            });
            // Appliquer le style bleu à l'élément sélectionné
            if (selectedCategory) {
                var selectedElement = document.getElementById(selectedCategory);
                if (selectedElement) {
                    selectedElement.classList.add('filter-active');
                    selectedElement.querySelector('.filter-link').style.color = 'black';
                }
            } else {
                // Si aucun élément n'est sélectionné, mettre en surbrillance "All"
                var allElement = document.getElementById('all');
                if (allElement) {
                    allElement.classList.add('filter-active');
                    allElement.querySelector('.filter-link').style.color = 'black';
                }
            }
        });
    </script>
    <script src="../assets/js/jquery-2.1.0.min.js"></script>
    <!-- Bootstrap -->
    <script src="../assets/js/popper.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- Plugins -->
    <script src="../assets/js/owl-carousel.js"></script>
    <script src="../assets/js/accordions.js"></script>
    <script src="../assets/js/datepicker.js"></script>
    <script src="../assets/js/scrollreveal.min.js"></script>
    <script src="../assets/js/waypoints.min.js"></script>
    <script src="../assets/js/jquery.counterup.min.js"></script>
    <script src="../assets/js/imgfix.min.js"></script> 
    <script src="../assets/js/slick.js"></script> 
    <script src="../assets/js/lightbox.js"></script> 
    <script src="../assets/js/isotope.js"></script> 
    <!-- Global Init -->
    <script src="../assets/js/custom.js"></script>
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
