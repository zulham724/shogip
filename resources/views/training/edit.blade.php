@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Training</h2>
  </div>
</div>

<section>
	
<div class="container">
	<div class="row">
		<div class="offset-3 col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('trainings') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Back</a>
					<h5 class="pull-right"> Fill the Form</h5>
				</div>
				<div class="card-body"> 
					
					<form action="{{ route('trainings.update',$umkm_trainings->id) }}" method="post">
						@method('put')
						@csrf
						<div class="form-group">
						<label>UMKM</label>
							<select class="form-control select2" name="umkm_id">
								@foreach ($umkm as $um => $umkms)
								<option value="{{ $umkms->id }}" {{$umkms->id==$umkm_trainings->umkm_id ? 'selected':null}}> {{ $umkms->name }} </option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" name="name"  value="{{ $umkm_trainings->name }}"  required> 
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea type="text" class="form-control" name="description" placeholder="type something" value="{{ $umkm_trainings->description}}" > </textarea>
						</div> 
						<div class="form-group">
							<label>Date</label>
							<input type="date" class="form-control" name="date"  value="{{ $umkm_trainings->date }}"  required> 
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