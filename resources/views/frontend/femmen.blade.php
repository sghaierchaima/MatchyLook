@extends('layouts.menu')
    @section('content')
   
    <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

     <link href="assets/cssh/style.css" rel="stylesheet">
     <link href="assets/vendorh/aos/aos.css" rel="stylesheet">
  <link href="assets/vendorh/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendorh/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendorh/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendorh/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendorh/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendorh/swiper/swiper-bundle.min.css" rel="stylesheet">
<style>
    h4{
        color: white;
    }
</style>
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                      <div class="go">
                       <h4> Chaque Femme </h4><span>mérite de se sentir belle et confiante, découvrez nos collections conçues pour mettre en valeur votre beauté naturelle.</h2>
                       </span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


     <!-- ***** Main Banner Area Start ***** --><section id="portfolio" class="portfolio">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Gategories</h2>
        </div>
        <div class="row" data-aos="fade-up" data-aos-delay="200">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                  
                  <li data-filter="*" class="filter-active" id="all" onclick="change('all')"> <a href="{{ route('Femme', ['selected' => 'all']) }}" class="filter-link" style="color: black;">All</a></li>
                  <li data-filter="*" class="filter-active" id="pull&chemise" onclick="change('Pulls&Chemise')"> <a href="{{ route('femme_pull', ['selected' => 'femme_pull']) }}" class="filter-link" style="color: black;">PULL&Chemise</a></li>
                  <li data-filter="*" class="filter-active" id="Pantalon" onclick="change('pantalon')"> <a href="{{ route('femme_pantalon', ['selected' => 'femme_pantalon']) }}" class="filter-link" style="color: black;">Pantalon</a></li>
                  


                </ul>
            </div>
        </div>
        <div class="femme">
            @yield('femme')
    </div>
    
<script src="assets/vendorh/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendorh/aos/aos.js"></script>
<script src="assets/vendorh/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendorh/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendorh/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendorh/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendorh/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/jsh/main.js"></script>
<script >

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
    selectedLink.style.color = 'blue'; // Changer la couleur du lien à bleu
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
      selectedElement.querySelector('.filter-link').style.color = 'blue';
    }
  }
});
</script>
  @endsection 
