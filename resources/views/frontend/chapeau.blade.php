@extends('frontend.accesoires')
    @section('acc')
    
    <section class="section" id="pantalon">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>chapeau </h2>
                        <span>-----------------------</span>
                    </div>
                </div>
            </div>
        </div>

        <section class="section" id="products">
       
        <div class="container">
            <div class="row">
               
                
               
                @foreach($data as $v)
                <div class="col-lg-4">
                    <div class="item">
                        <div class="thumb">
                            <div class="hover-content">
                                <ul>
                                    <li><a href="single-product.html"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="single-product.html"><i class="fa fa-star"></i></a></li>
                                    <li><a href="single-product.html"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <img src="{{asset('assets/images')}}/{{$v->image}} "alt="{{$v->image}}">
                            
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
        <div class="col-lg-12">
                    <div class="pagination">
                        <ul>
                            <li class="active">
                                <a href="#">1</a>
                            </li>
                            <li >
                                <a href="#">2</a>
                            </li>
                            <li>
                                <a href="#">3</a>
                            </li>
                            <li>
                                <a href="#">4</a>
                            </li>
                            <li>
                                <a href="#">></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>



    @endsection  