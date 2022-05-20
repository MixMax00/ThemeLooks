@extends('layouts.app')




@section('content')



  <section>
  	<div class="container">
  		<div class="row mt-3">
  			<div class="col-lg-6">
  				<div class="card">
  					<div class="card-header">
  						<h3 class="card-title">Color Form</h3>
  					</div>

              @if(session('success'))
              	<p class="alert alert-success">{{ session('success') }}</p>
              @endif
  					<form action="{{ route('color') }}" method="POST" class="p-2">
  						@csrf
	  					  <div class="mb-3">
						    <label for="colorName" class="form-label">Color Name</label>
						    <input type="text" class="form-control @error('color_name') is-invalid @enderror" id="colorName" name="color_name" value="" aria-describedby="emailHelp">
						  </div>
						  <button type="submit" class="btn btn-primary w-100">Submit</button>
					</form>
  				</div>
  			</div>
  			<div class="col-md-6">
  				<div class="card">
  					<div class="card-header">
  						<h3 class="card-title">Color</h3>
  					</div>

  					<div class="card-body">
  					<table class="table table-bordered">
  						   <thead class="bg-info">
  						   	   <th>Sl</th>
	  						   	 <th>Color Name</th>
	  						   	 <th>Status</th>
	  						   	 <th>Action</th>
  						   </thead>
  						   <tbody >

  						   	   @foreach($colors as $color)
  						   	    <tr>
  						   	     <td>{{ $loop->index +1 }}</td>
		  						   	 <td>{{ $color->color_name }}</td>
		  						   	 <td>{{ $color->status == 1 ? 'Active' : 'Deactive'  }}</td>
		  						   	 <td>Delete</td>
  						   	    </tr>
  						   	    @endforeach
  						   </tbody>
  							
  						</table>
  					</div>
   
  				</div>
  			</div>
  		</div>
  	</div>
  </section>






@endsection