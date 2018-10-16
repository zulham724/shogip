@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Distrik/Daerah</h2>
  </div>
</div>

<section>
	
<div class="container">
	<div class="row">
		<div class="offset-3 col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('districts') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Kembali</a>
					<h5 class="pull-right"> Isi Form</h5>
				</div>
				<div class="card-body"> 
					
					<form action="{{ route('districts.store') }}" method="post">
					@csrf
					@method('post')
						<div class="form-group">
						<label>Kota</label>
							<select class="form-control select2" name="city_id">
								@foreach ($cities as $st => $city)
								<option value="{{ $city->id }}">{{ $city->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Nama Distirk/Daerah</label>
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