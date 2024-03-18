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
					<img src="assets/images/registre.jpg" alt="">
				</div>
				<form action="{{route('registerUser')}}" method="post">
					@if(Session::has('success'))
					<div class="alert alert-success">{{Session::get('success')}}</div>
					@endif
					@if(Session::has('fail'))
					<div class="alert alert-danger">{{Session::get('fail')}}</div>
					@endif
					@csrf
					<h3>Inscription</h3>
					<div class="form-group">
						<input type="text" placeholder="Prénom" class="form-control" name="prenom" value="{{old('prenom')}}">
						<span class="text-danger">@error('prenom') {{$message}} @enderror</span>
						<input type="text" placeholder="Nom" class="form-control"name="nom" value="{{old('nom')}}">
						<span class="text-danger">@error('nom') {{$message}} @enderror</span>
					</div>
					<!-- <div class="form-wrapper">
						<input type="text" placeholder="Nom d’utilisateur" class="form-control">
						<i class="zmdi zmdi-account"></i>
					</div> -->
					<div class="form-wrapper">
						<input type="text" placeholder="Address Email" class="form-control"name="email" value="{{old('email')}}">
						<span class="text-danger">@error('email') {{$message}} @enderror</span>
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">
						<select name="sexe" id="" class="form-control" value="sexe">
							<option value="" disabled selected>sexe</option>
							<option value="homme">homme</option>
							<option value="femme">femme</option>
						
						</select>
						<span class="text-danger">@error('sexe') {{$message}} @enderror</span>

						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Mots de passe" class="form-control"name="motDePasse"value="{{old('motDePasse')}}">
						<span class="text-danger">@error('motDePasse') {{$message}} @enderror</span>
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Confirmez le mot de passe" class="form-control"name="paswordC"value="{{old('paswordC')}}">
						<span class="text-danger">@error('paswordC') {{$message}} @enderror</span>
						<i class="zmdi zmdi-lock"></i>
					</div>
					<button type="submit">S'inscrire
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
				</form>
			</div>
		</div>     
@endsection                  
