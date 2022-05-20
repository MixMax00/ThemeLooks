@extends('layouts.app')





@section('content')

  <section>
  	<div class="container">
  		<div class="row">
  			<div class="co-lg-12">
  				<div class="card">
  					<div class="card-header">
  						<h3 class="card-title">User Table</h3>
  					</div>
  					<div class="card-body">
  						<table class="table table-bordered">
  						   <thead class="bg-info">
  						   	    <th>Sl</th>
	  						   	 <th>Name</th>
	  						   	 <th>Email</th>
	  						   	 <th>Date Of birth</th>
	  						   	 <th>City</th>
	  						   	 <th>Country</th>
	  						   	 <th>Status</th>
	  						   	 <th>Action</th>
  						   </thead>
  						   <tbody >

  						   	   @foreach($viewuser as $user)
  						   	    <tr>
  						   	    	 <td>{{ $loop->index +1 }}</td>
		  						   	 <td>{{ $user->user_name }}</td>
		  						   	 <td>{{ $user->email }}</td>
		  						   	 <td>{{ $user->date_birth }}</td>
		  						   	 <td>{{ $user->city }}</td>
		  						   	 <td>{{ $user->country }}</td>
		  						   	 <td>{{ $user->status == 1 ? 'Active' : 'Deactive'  }}</td>
		  						   	 <td>
		  						   	 	<a href="{{ route('status',$user->id) }}" class="btn btn-{{ $user->status == 1 ? 'warning' : 'primary' }} btn-sm">{{ $user->status == 1 ? 'Deactive' : 'Active' }}</a>
		  						   	 	<a href="{{ route('edit',$user->id) }}" class="btn btn-sm btn-info">Edit</a>
		  						   	 	<a href="{{ route('delete',$user->id) }}" class="btn btn-sm btn-danger">Delete</a>
		  						   	 </td>
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