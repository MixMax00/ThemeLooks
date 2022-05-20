@extends('Frontend.master')




@section('content')



  <section>
  	<div class="container">
  		<div class="row mt-3">
  			<div class="col-lg-6 offset-lg-3">
  				<div class="card">
  					<div class="card-header">
  						<h3 class="card-title">Login</h3>
  					</div>

                    @if(session('success'))
                    	<p class="alert alert-success">{{ session('success') }}</p>
                    @endif
  					<form action="{{ route('user.login') }}" method="POST" class="p-2">
  						@csrf
						  <div class="mb-3">
						    <label for="exampleInputEmail1" class="form-label">Email</label>
						    <input type="email" class="form-control @error('email') is-invalid @enderror" id="userName" name="email" value="{{ old('email') }}" id="exampleInputEmail1" aria-describedby="emailHelp">  
						    @error('email')
	                  <span class="invalid-feedback" role="alert">
	                      <strong>{{ $message }}</strong>
	                  </span>
	              @enderror
						  </div>
						  <div class="mb-3">
						    <label for="exampleInputPassword1" class="form-label">Password</label>
						    <input type="password" class="form-control @error('password') is-invalid @enderror" id="userName" name="password" id="exampleInputPassword1">
						    @error('password')
	                  <span class="invalid-feedback" role="alert">
	                      <strong>{{ $message }}</strong>
	                  </span>
	              @enderror
						  </div>
						  <button type="submit" class="btn btn-primary w-100">Login</button>
					</form>
  				</div>
  			</div>
  		</div>
  	</div>
  </section>






@endsection