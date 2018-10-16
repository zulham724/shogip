@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Produk</h2>
  </div>
</div>

<section>
	
<div class="container">
	<div class="row">
		<div class="offset-3 col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('products') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Kembali</a>
					<h5 class="pull-right"> Edit Form</h5>
				</div>
				<div class="card-body"> 
					
					<form action="{{ route('products.update',$products->id) }}" method="post">
						@method('put')
						@csrf
						<div class="form-group">
						<label>Nama UMKM</label>
							<select class="form-control select2" name="umkm_id">
								@foreach ($umkm as $um => $umkms)
								<option value="{{ $umkms->id }}" {{$umkms->id==$products->umkm_id ? 'selected':null}}> {{ $umkms->name }} </option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Nama Produk</label>
							<input type="text" class="form-control" name="name"  value="{{ $products->name }}"  required> 
						</div>
						<div class="form-group">
							<label>Deskripsi</label>
							<textarea type="text" class="form-control" name="description" placeholder="type something">{{ $products->description}}</textarea>
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