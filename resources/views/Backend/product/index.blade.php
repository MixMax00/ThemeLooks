@extends('layouts.app')




@section('content')



  <section>
  	<div class="container">
  		<div class="row mt-3">
  			<div class="col-lg-8 offset-2">
  				<div class="card">
  					<div class="card-header d-flex justify-content-between">
  						<h3 class="card-title">Add Product</h3>
  						<a href="{{ route('manage.product') }}" class="btn btn-sm btn-primary card-title">View Product</a>
  					</div>

              @if(session('success'))
              	<p class="alert alert-success">{{ session('success') }}</p>
              @endif
  					<form action="{{ route('store.product') }}" method="POST" enctype="multipart/form-data" class="p-2">
  						@csrf
	  					  <div class="mb-3">
							    <label for="colorName" class="form-label">Product Name</label>
							    <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="colorName" name="product_name" value="" aria-describedby="emailHelp">
						    </div>
						    <div class="mb-3">
							    <label for="color_id" class="form-label">Color</label>
							    <select class="form-control @error('color_id') is-invalid @enderror" name="color_id">
							    	 <option>-----Select Color-----</option>
							    	 @foreach($colors as $color)
							    	 <option value="{{ $color->id }}">{{ $color->color_name }}</option>
							    	 @endforeach
							    </select>
						    </div>
						    <div class="mb-3">
							    <label for="size_id" class="form-label">Size</label>
							    <select class="form-control @error('size_id') is-invalid @enderror" name="size_id">
							    	 <option>-----Select Color-----</option>
							    	 @foreach($sizes as $size)
							    	 <option value="{{ $size->id }}">{{ $size->size_name }}</option>
							    	 @endforeach
							    </select>
						    </div>
						    <div class="mb-3">
							    <label for="gender_id" class="form-label">Gender</label>
							    <select class="form-control @error('gender_id') is-invalid @enderror" name="gender_id">
							    	 <option>-----Select Color-----</option>
							    	 @foreach($genders as $gender)
							    	 <option value="{{ $gender->id }}">{{ $gender->gender_name }}</option>
							    	 @endforeach
							    </select>
						    </div>
						    <div class="mb-3">
							    <label for="colorName" class="form-label">Price</label>
							    <input type="text" class="form-control @error('price') is-invalid @enderror" id="colorName" name="price" value="" aria-describedby="emailHelp">
						    </div>
						    <div class="mb-3">
							    <label for="colorName" class="form-label">Sale Price</label>
							    <input type="text" class="form-control @error('sale_price') is-invalid @enderror" id="colorName" name="sale_price" value="" aria-describedby="emailHelp">
						    </div>
						     <div class="mb-3">
							    <label for="qty" class="form-label">Quantity</label>
							    <input type="number" class="form-control @error('qty') is-invalid @enderror" id="qty" name="qty" value="" aria-describedby="emailHelp">
						    </div>
						    <div class="mb-3">
							    <label for="colorName" class="form-label">Short Description</label>
							    <input type="text" class="form-control @error('short_description') is-invalid @enderror" id="colorName" name="short_description" value="" aria-describedby="emailHelp">
						    </div>

						    <div class="mb-3">
							    <label for="colorName" class="form-label">Description</label>
							    <input type="text" class="form-control @error('description') is-invalid @enderror" id="colorName" name="description" value="" aria-describedby="emailHelp">
						    </div>
						    <div class="mb-3">
							    <label for="colorName" class="form-label">Other Onfo</label>
							    <input type="text" class="form-control @error('other_info') is-invalid @enderror" id="colorName" name="other_info" value="" aria-describedby="emailHelp">
						    </div>
						     <div class="mb-3">
							    <label for="product_image" class="form-label">Product Image</label>
							    <input type="file" class="form-control @error('product_image') is-invalid @enderror" id="product_image" name="product_image" value="" aria-describedby="emailHelp">
						    </div>
						  <button type="submit" class="btn btn-primary w-100">Add Product</button>
					  </form>
  				</div>
  			</div>
  		
  		</div>
  	</div>
  </section>






@endsection