@extends('layouts.app')




@section('content')



  <section>
  	<div class="container">
  		<div class="row mt-3">
  			<div class="col-lg-6 offset-lg-3">
  				<div class="card">
  					<div class="card-header">
  						<h3 class="card-title">Registataion Edit</h3>
  					</div>

                    @if(session('success'))
                    	<p class="alert alert-success">{{ session('success') }}</p>
                    @endif
  					<form action="{{ route('update') }}" method="POST" class="p-2">
  						@csrf
	  					  <div class="mb-3">
						    <label for="userName" class="form-label">User Name</label>
						    <input type="hidden" name="user_id" value="{{ $user_edit->id }}">
						    <input type="text" class="form-control @error('user_name') is-invalid @enderror" id="userName" name="user_name" value="{{ $user_edit->user_name }}" aria-describedby="emailHelp">
						  </div>
						  <div class="mb-3">
						    <label for="userName" class="form-label">Date of birth</label>
						    <input type="date" class="form-control @error('date_birth') is-invalid @enderror" id="userName" name="date_birth" value="{{ $user_edit->date_birth }}" id="userName" aria-describedby="emailHelp">
						  </div>
						  <div class="mb-3">
						    <label for="userName" class="form-label">City</label>
						    <input type="text" class="form-control @error('city') is-invalid @enderror" id="userName" name="city" id="userName" value="{{ $user_edit->city }}" aria-describedby="emailHelp">
						  </div>
						  <div class="mb-3">
						    <label for="userName" class="form-label">Country</label>
						    <input type="text" class="form-control @error('country') is-invalid @enderror" id="userName" name="country" value="{{ $user_edit->country }}" id="userName" aria-describedby="emailHelp">
						  </div>
						  <button type="submit" class="btn btn-primary w-100">Update Registation</button>
					</form>
  				</div>
  			</div>
  		</div>
  	</div>
  </section>






@endsection