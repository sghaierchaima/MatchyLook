@extends('layouts.menu')
    @section('content')
    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <div class="container-fluid">
    <!-- ***** Main Banner Area End ***** -->


    <!-- ***** Products Area Starts ***** -->
   
                 
    <div class="wrapper" style="background-image: url('assets/images/bg-registration-form-1.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="assets/images/avtr.jpg" alt="">
				</div>
				<form action="{{route('connexionUser')}}" method="post">
				@if(Session::has('success'))
					<div class="alert alert-success">{{Session::get('success')}}</div>
					@endif
					@if(Session::has('fail'))
					<div class="alert alert-danger">{{Session::get('fail')}}</div>
					@endif
					@csrf
					<h3>Creer Votre Avatar</h3>
                    <br>
					<div class="form-wrapper">
						<input type="text" placeholder="Address Email" class="form-control"name="email" value="{{old('email')}}">
						<span class="text-danger">@error('email') {{$message}} @enderror</span>
						<i class="zmdi zmdi-email"></i>
					</div>
					
					<div class="form-wrapper">
						<input type="password" placeholder="Mots de passe" class="form-control"name="motDePasse"value="{{old('motDePasse')}}">
						<span class="text-danger">@error('motDePasse') {{$message}} @enderror</span>
						<i class="zmdi zmdi-lock"></i>
					</div>
					<!-- <button type="submit" >connexion</button> -->
					 <button type="submit">connexion
						<i class="zmdi zmdi-arrow-right"></i>
					</button> 
					
					

                   <!--  <button ><a  href="{{ url('registre') }}"style="color: white;">S'inscrire</a>
						<i class="zmdi zmdi-arrow-right"></i>
					</button> -->
                    
				</form>
			</div>
		</div>     
@endsection                  
