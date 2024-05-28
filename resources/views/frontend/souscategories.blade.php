@extends('frontend.hommen')

@section('homme')
<section class="section" id="pantalon">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                <h2>{{ $nomSousCategorie }}</h2>
                    <span>-----------------------</span>
                </div>
            </div>
        </div>
    </div>

    <section class="section" id="products">
        <div class="container">
            <div class="row">
                <!-- Afficher les produits ici -->
            </div>
        </div>
    </section>
</section>
@endsection
