@extends('Frontend.master')




@section('content')



  <section>
  	<div class="container">
  		<div class="row mt-3">
  			<div class="col-lg-6 offset-lg-3">
  				<div class="card">
  					<div class="card-header d-flex justify-content-between">
  						<h3 class="card-title">Profile</h3>
              <a href="" class="btn btn-info">Edit</a>
  					</div>
  					<div class="card-body">
  						<table class="table table-bordered">
  							<tr>
  								<td>User Name</td>
  								<td>{{ $profile_id->user_name }}</td>
  							</tr>
  							<tr>
  								<td>Email</td>
  								<td>{{ $profile_id->email }}</td>
  							</tr>
  							<tr>
  								<td>Date Of Birth</td>
  								<td>{{ $profile_id->date_birth }}</td>
  							</tr>
  							<tr>
  								<td>City</td>
  								<td>{{ $profile_id->city }}</td>
  							</tr>
  							<tr>
  								<td>Country</td>
  								<td>{{ $profile_id->country }}</td>
  							</tr>	
  						</table>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  </section>






@endsection