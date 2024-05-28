@extends('layouts.menu')
@section('content')

    <!-- ***** Main Banner Area Start ***** -->
   
    <div class="main-banner" id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <div class="thumb">
                            <div class="inner-content">
                                <h4>Nous Sommes Matchy Look</h4>
                                <span>Awesome, clean &amp;</span>
                                <div class="main-border-button">

                                    Découvrir !

                                    <a href="{{url('femme')}}">Découvrir !</a>

                                </div>
                            </div>
                            <img src="assets/images/left-banner-image.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Femme</h4>
                                            <span>Meilleurs vêtements  pour Femme</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Femme</h4>
                                                <p></p>
                                                <div class="main-border-button">
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/baner-right-image-01.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Homme</h4>
                                            <span>Meilleurs vêtements  pour Homme </span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Men</h4>
                                                <div class="main-border-button">
                                                   Découvrir plus
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/baner-right-image-02.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Promotion</h4>
                                            <span>Meilleure Promo 
                                            </span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Promotion</h4>
                                                <p>Promotion d'Hiver 2024</p>
                                                <div class="main-border-button">
                                                    Découvrir plus
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/mmm.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Collection Hiver </h4>
                                            <span>Nouvelle collection 2024</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Hiver 2024</h4>
                                                <p>Hiver 2024</p>
                                                <div class="main-border-button">
                                                    Découvrir plus
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/m4.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Men Area Starts ***** -->
    <section class="section" id="men">
    <div class="container">
        <div class="section-heading">
            <h2>Homme</h2>
        </div>
        <div class="row">
            @foreach($produits as $v)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="item">
                    <div class="thumb">
                        <div class="hover-content">
                            
                        </div>
                        <img src="{{asset('assets/images')}}/{{$v->image}}" alt="{{$v->image}}" class="img-fluid">
                    </div>
                    <div class="down-content">
                        <h4>{{$v->nom}}</h4>
                        <span class="text-secondary text-xs font-weight-bold">{{$v->couleur}}</span>
                        <span>Prix: {{ number_format($v->prix, 2, ',', ' ') }} DT</span>
                        <p class="text-xs text-secondary mb-0">{{$v->description}}</p>
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
    <!-- ***** Men Area Ends ***** -->
 
<section class="section" id="women">
    <div class="container">
        <div class="section-heading">
            <h2>Femme</h2>
        </div>
        <div class="row">
            @foreach($femme as $v)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="item">
                    <div class="thumb">
                        <div class="hover-content">
                            
                        </div>
                        <img src="{{asset('assets/images')}}/{{$v->image}}" alt="{{$v->image}}" class="img-fluid">
                    </div>
                    <div class="down-content">
                        <h4>{{$v->nom}}</h4>
                        <span class="text-secondary text-xs font-weight-bold">{{$v->couleur}}</span>
                        <span>Prix: {{ number_format($v->prix, 2, ',', ' ') }} DT</span>
                        <p class="text-xs text-secondary mb-0">{{$v->description}}</p>
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

    <!-- ***** Explore Area Starts ***** -->
    <section class="section" id="explore">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <h2>Matchy Look </h2>
                        <span>Matchy Look, est un site e-commerce qui offre aux utilisateurs la possibilité de créer leur propre avatar et de faire un essayage virtuel avec cet avatar. Notre site web simplifie le processus, permettant aux internautes de personnaliser leur représentation virtuelle avec style et facilité. De plus, nous proposons des recommandations personnalisées en fonction de vos besoins.</span>
                        <div class="quote">
                            <i class="fa fa-quote-left"></i><p><b>Essayez avant d'acheter et éliminez les soucis !</b></p>
                        </div>
                        <p>Chez nous, vous pouvez créer votre propre avatar et l'essayer avant de passer à l'achat. Notre objectif est votre satisfaction totale. Avec notre outil de création d'avatar convivial, vous avez la liberté de personnaliser chaque détail pour qu'il reflète parfaitement votre style et votre personnalité.</p>
                        <div class="main-border-button">
                            Commencer ! 
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="leather">
                                    <h4>Matchy</h4>
                                    <span>One Clic</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="first-image">
                                    <img src="assets/images/explore-image-01.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="second-image">
                                    <img src="assets/images/explore-image-02.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="types">
                                    <h4>LOOK</h4>
                                    <span>For Chic </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Explore Area Ends ***** -->
    @endsection