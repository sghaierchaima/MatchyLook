
@extends('layouts.menu')
@section('content')
<link href="../assets/img/favicon.png" rel="icon">
<link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<link href="../assets/cssh/style.css" rel="stylesheet">
<link href="../assets/vendorh/aos/aos.css" rel="stylesheet">
<link href="../assets/vendorh/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/vendorh/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="../assets/vendorh/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="../assets/vendorh/glightbox/css/glightbox.min.css" rel="stylesheet">
<link href="../assets/vendorh/remixicon/remixicon.css" rel="stylesheet">
<link href="../assets/vendorh/swiper/swiper-bundle.min.css" rel="stylesheet">

<div class="page-heading" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2>Consultez nos produits</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<section id="portfolio" class="portfolio">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Gategories</h2>
            <div class="row" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        @foreach($sousCategories as $sousCategorie)
                        <li>
            <a href="{{ route('produitBySousCategories', $sousCategorie->id) }}" 
               @if($sousCategorie->id == $activeSubcategoryId)
                   style="color: black; background-color: yellow;" <!-- Ajoutez ici le style jaune pour le bouton actif -->
               @else
                   style="color: black;"
               @endif
            >
               {{ $sousCategorie->nom }}
            </a>
        </li>
         @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
</section>

<section class="section" id="products">
    <div class="container">
        <div class="row">
            @foreach($produits as $produit)
            <div class="col-lg-4">
                <div class="item">
                    <div class="thumb">
                        <div class="hover-content">
                            <ul>
                              
                                <button class="ajouter-au-panier" data-produit="{{ $produit->id }}"><i class="fa fa-shopping-cart"></i></button>
                            </ul>
                        </div>
                        <img src="{{asset('assets/images')}}/{{$produit->image}}" alt="{{$produit->image}}" style="width: 100%; height: 450;">
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

<!-- Votre contenu existant ici -->

<script src="../assets/vendorh/purecounter/purecounter_vanilla.js"></script>
<script src="../assets/vendorh/aos/aos.js"></script>
<script src="../assets/vendorh/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendorh/glightbox/js/glightbox.min.js"></script>
<script src="../assets/vendorh/isotope-layout/isotope.pkgd.min.js"></script>
<script src="../assets/vendorh/swiper/swiper-bundle.min.js"></script>
<script src="../assets/vendorh/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="../assets/jsh/main.js"></script>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.ajouter-au-panier').click(function(e) {
            e.preventDefault(); // Empêcher le comportement par défaut du bouton (c'est-à-dire l'actualisation de la page)

            var produitId = $(this).data('produit');

            $.ajax({
                url: '/ajouter-au-panier/' + produitId,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    quantite: 1 // Vous pouvez ajouter la quantité ici si nécessaire
                },
                success: function(response) {
                    // Gérer la réponse ici, par exemple afficher un message de succès
                    alert('Le produit a été ajouté au panier.');
                },
                error: function(xhr, status, error) {
                    // Gérer les erreurs ici
                    console.error(error);
                }
            });
        });
    });
</script>

