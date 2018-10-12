@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Gambar Product</h2>
  </div>
</div>

<section>
	
<div class="container">
	<div class="row">
		<div class="offset-3 col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('productimages') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Back</a>
					<h5 class="pull-right"> Fill the Form</h5>
				</div>
				<div class="card-body"> 
					
					<form action="{{ route('productimages.update',$productimages->id) }}" enctype="multipart/form-data" files="true" method="post">
						@method('put')
						@csrf
						<div class="form-group">
						<label>Nama Product</label>
							<select class="form-control select2" name="product_id">
								@foreach ($products as $p => $products)
								<option value="{{ $products->id }}" {{$products->id==$productimages->product_id ? 'selected':null}}> {{ $products->name }} </option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Gambar</label>
							<img src="{{ asset('storage/'.$productimages->image) }}" class="rounded mx-auto d-block" width="50">
							<input type="file" name="image" class="form-control">
						</div>
						<div class="form-group">
							<label>Deskripsi</label>
							<textarea type="text" class="form-control" name="description" placeholder="type something">{{ $productimages->description}} </textarea>
						</div> 
						 
						<button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> Submit</button>
					</form> 
					
				</div>
			</div>
		</div>
	</div>
</div>
	
</section>
@endsection