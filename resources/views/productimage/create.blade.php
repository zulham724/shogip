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
					
					<form action="{{ route('productimages.store') }}" enctype="multipart/form-data" files="true" method="post">
					@csrf
					@method('post')
						<div class="form-group">
						<label>Nama Product</label>
							<select class="form-control select2" name="product_id">
								@foreach ($products as $um => $product)
								<option value="{{ $product->id }}">{{ $product->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Gambar</label>
							<!-- <img src="{{ asset('storage/uploads/avatars/default.png') }}" class="rounded mx-auto d-block" width="150"> -->
							<input type="file" name="image" class="form-control">
						</div>
						<div class="form-group">
							<label>Nama</label>
							<input type="text" class="form-control" name="name" placeholder="type something" required> 
						</div>
						<div class="form-group">
							<label>Deskripsi</label>
							<textarea type="text" class="form-control" name="description" placeholder="type something" > </textarea>
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