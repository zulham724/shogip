@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Provinsi</h2>
  </div>
</div>

<section>
	
<div class="container">
	<div class="row">
		<div class="offset-3 col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('states') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Kembali</a>
					<h5 class="pull-right"> Isi Form</h5>
				</div>
				<div class="card-body"> 
					
					<form action="{{ route('states.store') }}" method="post">
					{{ csrf_field()}} 
						<div class="form-group">
							<label>Nama Provinsi</label>
							<input type="text" class="form-control" name="name" placeholder="type something" required> 
						</div>
						<div class="form-group">
							<label>Deskripsi</label>
							<textarea type="text" class="form-control" name="description" placeholder="type something"></textarea> 
						</div>
						<div class="form-group">
							<label>Latitude</label>
							<input type="text" class="form-control" name="lat" placeholder="type something" required> 
						</div>
						<div class="form-group">
							<label>Longitude</label>
							<input type="text" class="form-control" name="lng" placeholder="type something" required> 
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