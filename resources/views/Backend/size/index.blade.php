@extends('layouts.app')




@section('content')



  <section>
  	<div class="container">
  		<div class="row mt-3">
  			<div class="col-lg-6">
  				<div class="card">
  					<div class="card-header">
  						<h3 class="card-title">Size Form</h3>
  					</div>

              @if(session('success'))
              	<p class="alert alert-success">{{ session('success') }}</p>
              @endif
  					<form action="{{ route('size') }}" method="POST" class="p-2">
  						@csrf
	  					  <div class="mb-3">
						    <label for="colorName" class="form-label">Size Name</label>
						    <input type="text" class="form-control @error('size_name') is-invalid @enderror" id="colorName" name="size_name" value="" aria-describedby="emailHelp">
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
	  						   	 <th>Size Name</th>
	  						   	 <th>Status</th>
	  						   	 <th>Action</th>
  						   </thead>
  						   <tbody >

  						   	   @foreach($sizes as $size)
  						   	    <tr>
  						   	     <td>{{ $loop->index +1 }}</td>
		  						   	 <td>{{ $size->size_name }}</td>
		  						   	 <td>{{ $size->status == 1 ? 'Active' : 'Deactive'  }}</td>
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