@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Biodata</h2>
  </div>
</div>

<section>
	
<div class="container">
	
	<div class="row">
		<div class="col-2">
			
		</div>
		<div class="col-8">
			<div class="card">
				<div class="card-header">
					<h5 class="pull-right">Form Biodata</h5>
				</div>
				<div class="card-body">
					<form action="{{ route('biodatas.store') }}" method="post">
					{{ csrf_field()}} 
					<div class="form-group">
						<label>User</label>
							<select class="form-control select2" name="user_id">
								@foreach ($users as $u => $user)
								<option value="{{ $user->id }}">{{ $user->name }}</option>
								@endforeach
							</select>
						</div>
					<div class="form-group">
						<label>First name</label>
						<input type="text" class="form-control" name="first_name" placeholder="type something" required>
					</div>
					<div class="form-group">
						<label>Last name</label>
						<input type="text" class="form-control" name="last_name" placeholder="type something" required>
					</div>			
					<div class="form-group">
						<label>Birth of date</label>
						<input type="date" class="form-control" name="birth_of_date" placeholder="type something" required>
					</div>
					<div class="form-group">
						<label>Province</label>
						<input type="text" class="form-control" name="province_id" placeholder="type something" required>
					</div>
					<div class="form-group">
						<label>City</label>
						<input type="text" class="form-control" name="city_id" placeholder="type something" required> 
					</div>
					<div class="form-group">
						<label>District</label>
						<input type="text" class="form-control" name="district_id" placeholder="type something" required> 
					</div> 
					<div class="form-group">
						<label>iIdentity Number</label>
						<input type="text" class="form-control" name="identify_number" placeholder="type something" required> 
					</div>			
					
					<button type="submit" class="btn btn-dark pull-right"><i class="fa fa-check"></i> Submit</button>

					</form> 
				</div>
			</div>
		</div>
		<div class="col-2">
		</div>
	</div>
	
</div>
	
</section>
@endsection