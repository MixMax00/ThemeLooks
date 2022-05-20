@extends('layouts.app')




@section('content')



  <section>
  	<div class="container">
  		<div class="row mt-3">
  			<div class="col-lg-12">
  				<div class="card">
  					<div class="card-header d-flex justify-content-between">
  						<h3 class="card-title">View Product</h3>
  						<a href="{{ route('add.product') }}" class="btn btn-sm btn-primary card-title">Add Product</a>
  					</div>

  					@if(session('success'))
             <span class="alert alert-success">{{ session('success') }}</span>
  					@endif

  					<div class="card-body">
  						<table class="table table-bordered table-responsive">
  							<thead class="bg-light">
  								<td>Sl</td>
  								<td>Img</td>
  								<td>Product Name</td>
  								<td>Color</td>
  								<td>Size</td>
  								<td>Gender</td>
  								<td>Sale Price</td>
  								<td>Qty</td>
  								<td>Short Des</td>
  								<td>Action</td>
  							</thead>
  							<tbody>

  								@foreach($products as $product)
  								<tr>
  									<td>{{ $loop->index +1 }}</td>
  									<td><img src="{{ asset('/storage/product/'.$product->product_img) }}" width="100px" height="100px"></td>
  									<td>{{ $product->product_name }}</td>
  									<td>{{ $product->productToColor->color_name }}</td>
  									<td>{{ $product->productToSize->size_name }}</td>
  									<td>{{ $product->productTogender->gender_name }}</td>
  									<td>{{ $product->sale_price}}</td>
  									<td>{{ $product->qty }}</td>
  									<td>{{ $product->short_description }}</td>
  									<td>
  										<a class="btn btn-sm btn-success mb-2" href="{{ route('view.product',['id'=>$product->id]) }}">Show</a>
  										<a class="btn btn-sm btn-info mb-2" href="{{ route('edit.product',['id'=>$product->id]) }}">Edit</a>
  										<a class="btn btn-sm btn-danger mb-2" href="{{ route('delete.product',['id'=>$product->id]) }}">Delete</a>
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