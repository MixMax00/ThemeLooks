@extends('Frontend.master')




@section('content')



  <section>
  	<div class="container">
  		<div class="row mt-3">
  			<div class="col-lg-6 offset-lg-3">
  				<div class="card">
  					<div class="card-header">
  						<h3 class="card-title">Registataion</h3>
  					</div>

                    @if(session('success'))
                    	<p class="alert alert-success">{{ session('success') }}</p>
                    @endif
  					<form action="{{ route('register') }}" method="POST" class="p-2">
  						@csrf
	  					  <div class="mb-3">
						    <label for="userName" class="form-label">User Name</label>
						    <input type="text" class="form-control @error('user_name') is-invalid @enderror" id="userName" name="user_name" aria-describedby="emailHelp">
						  </div>
						  <div class="mb-3">
						    <label for="exampleInputEmail1" class="form-label">Email</label>
						    <input type="email" class="form-control @error('email') is-invalid @enderror" id="userName" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">  
						  </div>
						  <div class="mb-3">
						    <label for="exampleInputPassword1" class="form-label">Password</label>
						    <input type="password" class="form-control @error('password') is-invalid @enderror" id="userName" name="password" id="exampleInputPassword1">
						  </div>
						  <div class="mb-3">
						    <label for="userName" class="form-label">Date of birth</label>
						    <input type="date" class="form-control @error('date_birth') is-invalid @enderror" id="userName" name="date_birth" id="userName" aria-describedby="emailHelp">
						  </div>
						  <div class="mb-3">
						    <label for="userName" class="form-label">City</label>
						    <input type="text" class="form-control @error('city') is-invalid @enderror" id="userName" name="city" id="userName" aria-describedby="emailHelp">
						  </div>
						  <div class="mb-3">
						    <label for="userName" class="form-label">Country</label>
						    <input type="text" class="form-control @error('country') is-invalid @enderror" id="userName" name="country" id="userName" aria-describedby="emailHelp">
						  </div>
						  <button type="submit" class="btn btn-primary w-100">Registation</button>
					</form>
  				</div>
  			</div>
  		</div>
  	</div>
  </section>






@endsection