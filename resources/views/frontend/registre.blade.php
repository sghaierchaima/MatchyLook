@extends('layouts.menu')
    @section('content')
    <!-- ***** Main Banner Area Start ***** -->
    
    <!-- ***** Main Banner Area End ***** -->


    <!-- ***** Products Area Starts ***** -->
   
                 
    <div class="wrapper" style="background-image: url('assets/images/bg-registration-form-1.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="assets/images/registre.jpg" alt="">
				</div>
				<form action="">
					<h3>Inscription</h3>
					<div class="form-group">
						<input type="text" placeholder="Prénom" class="form-control">
						<input type="text" placeholder="Nom" class="form-control">
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Nom d’utilisateur" class="form-control">
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Address Email" class="form-control">
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">
						<select name="" id="" class="form-control">
							<option value="" disabled selected>Gender</option>
							<option value="male">homme</option>
							<option value="femal">femme</option>
						
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Mots de passe" class="form-control">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Confirm Password" class="form-control">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<button>Register
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
				</form>
			</div>
		</div>     
@endsection                  
