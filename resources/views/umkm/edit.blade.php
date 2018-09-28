@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">UMKM</h2>
  </div>
</div>

<section>
	
<div class="container">
	<div class="row">
		<div class="offset-3 col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('umkms') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Back</a>
					<h5 class="pull-right"> Fill the Form</h5>
				</div>
				<div class="card-body"> 
					
					<form action="{{ route('umkms.update',$umkm->id) }}" method="post">
						@method('put')
						@csrf
						<div class="form-group">
						<label>UMKM Category</label>
							<select class="form-control select2" name="umkm_category_id">
								@foreach ($umkm_categories as $uc => $umkmcategory)
								<option value="{{ $umkmcategory->id }}">{{ $umkmcategory->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
						<label>State</label>
							<select class="form-control select2" name="state_id">
								@foreach ($states as $st => $state)
								<option value="{{ $state->id }}">{{ $state->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
						<label>City</label>
							<select class="form-control select2" name="city_id">
								@foreach ($cities as $c => $city)
								<option value="{{ $city->id }}">{{ $city->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
						<label>District</label>
							<select class="form-control select2" name="district_id">
								@foreach ($districts as $d => $district)
								<option value="{{ $district->id }}">{{ $district->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" name="name"  value="{{ $umkm->name }}"  required> 
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea type="text" class="form-control" name="description" placeholder="type something" value="{{ $umkm->description}}" > </textarea>
						</div> 
						<div class="form-group">
							<label>Address</label>
							<textarea type="text" class="form-control" name="address" placeholder="type something" value="{{ $umkm->address}}" > </textarea>
						</div>
						<div class="form-group">
							<label>CP</label>
							<input type="text" class="form-control" name="cp"  value="{{ $umkm->cp }}"  required> 
						</div> 
						<div class="form-group">
							<label>Web</label>
							<input type="text" class="form-control" name="web"  value="{{ $umkm->web }}"  required> 
						</div> 
						<div class="form-group">
							<label>Facebook</label>
							<input type="text" class="form-control" name="facebook"  value="{{ $umkm->facebook }}"  required> 
						</div> 
						<div class="form-group">
							<label>Twitter</label>
							<input type="text" class="form-control" name="twitter"  value="{{ $umkm->twitter }}"  required> 
						</div> 
						<div class="form-group">
							<label>Instagram</label>
							<input type="text" class="form-control" name="instagram"  value="{{ $umkm->instagram }}"  required> 
						</div> 
						<div class="form-group">
							<label>Latitude</label>
							<input type="text" class="form-control" name="latitude"  value="{{ $umkm->latitude }}"  required> 
						</div> 
						<div class="form-group">
							<label>Longitude</label>
							<input type="text" class="form-control" name="longitude"  value="{{ $umkm->longitude }}"  required> 
						</div> 
						<!--  -->
						<button type="submit" class="btn btn-dark pull-right"><i class="fa fa-check"></i> Submit</button>
					</form> 
					
				</div>
			</div>
		</div>
	</div>
</div>
	
</section>
@endsection