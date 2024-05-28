
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
            <a href="{{ route('produitBySousCategoriesa', $sousCategorie->id) }}" 
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
    <div id="success-message" style="color: green;"></div>
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
                    <input type="number" min="1" max="{{ $produit->quantite }}" value="1" class="quantite-input" data-produit="{{ $produit->id }}" data-quantite-max="{{ $produit->quantite }}">
                    <button class="ajouter-au-panier" data-produit="{{ $produit->id }}"><i class="fa fa-shopping-cart"></i></button>
                </ul>
                <div class="error-message" style="color: red;"></div> <!-- Ajout du div pour afficher le message d'erreur -->
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
                        <h2>Avis:</h2>
                        @foreach($produit->avis as $avis)
                <li><strong>{{ $avis->utilisateur->nom }} {{ $avis->utilisateur->prenom }}:</strong>     {{ $avis->avis }} - Note: {{ $avis->note }}/5  </li>
            @endforeach 
                    </div>
                </div>
            </div>
            
            @endforeach
        </div>
    </div>
</section>
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="successModalLabel">Produit ajouté au panier avec succès</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-4">
            <img src="" alt="Produit" id="productImage" style="width: 100%;">
          </div>
          <div class="col-8">
            <h6 id="productName">Nom du produit</h6>
            <p id="productDetails">Détails du produit</p>
          </div>
        </div>
        <hr>
        <p>Il y a <span id="cartItemCount">0</span> articles dans votre panier.</p>
        <p>Total produits: <span id="cartTotalPrice">0.00</span> TND</p>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Continuer mes achats</button>
        <a href="/panier" class="btn btn-primary">Passer à la caisse</a>
      </div>
    </div>
  </div>
</div>

<!-- Votre contenu existant ici -->
<script src="../assets/vendorh/purecounter/purecounter_vanilla.js"></script>
<script src="../assets/vendorh/aos/aos.js"></script>
<script src="../assets/vendorh/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendorh/glightbox/js/glightbox.min.js"></script>
<script src="../assets/vendorh/isotope-layout/isotope.pkgd.min.js"></script>
<script src="../assets/vendorh/swiper/swiper-bundle.min.js"></script>
<script src="../assets/vendorh/php-email-form/validate.js"></script>
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
        e.preventDefault();

        var produitId = $(this).data('produit');
        var quantiteInput = $(this).closest('.hover-content').find('.quantite-input');
        var quantiteChoisie = parseInt(quantiteInput.val());

        var errorMessageElement = $(this).closest('.hover-content').find('.error-message');

        $.ajax({
            url: '/ajouter-au-panier/' + produitId,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                quantite: quantiteChoisie
            },
            success: function(response) {
                if (response.error) {
                    errorMessageElement.text(response.error);
                } else {
                    // Mettre à jour les informations du produit dans le modal
                    $('#productImage').attr('src', response.produitImage);
                    $('#productName').text(response.produitNom);
                    $('#productDetails').text('Taille: ' + response.produitTaille + ' | Couleur: ' + response.produitCouleur);
                    $('#cartItemCount').text(response.cartItemCount);
                    $('#cartTotalPrice').text(response.cartTotalPrice);
                    $('#cartTotalTTC').text(response.cartTotalTTC);

                    // Afficher le modal
                    $('#successModal').modal('show');

                    // Réinitialiser le champ de quantité à sa valeur par défaut
                    quantiteInput.val(1);

                    // Effacer le message d'erreur s'il était affiché précédemment
                    errorMessageElement.text('');
                }
            },
            error: function(xhr, status, error) {
                // Afficher le message d'erreur personnalisé sous l'input de quantité
                var errorMessage = xhr.responseJSON && xhr.responseJSON.error ? xhr.responseJSON.error : 'Une erreur s\'est produite.';
                errorMessageElement.text(errorMessage);

                // Réinitialiser le champ de quantité à sa valeur par défaut
                quantiteInput.val(1);
            }
        });
    });
});

</script>