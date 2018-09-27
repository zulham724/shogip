@extends( 'layouts.admin')
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
					<h5 class="pull-right">Form Edit Biodata</h5>
				</div>
				<div class="card-body">
					<form action="{{ route('biodatas.update',$biodatas->id) }}" method="post">
						@method('put')
						@csrf

					<div class="form-group">
						<label>First Name</label>
						<input type="text" class="form-control" value="{{ $biodatas->first_name }}"  name="first_name" placeholder="type something" required> 
					</div> 
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" class="form-control" value="{{ $biodatas->last_name }}"  name="last_name" placeholder="type something" required> 
					</div>
					<div class="form-group">
						<label>Province</label>
						<input type="text" class="form-control" value="{{ $biodatas->province_id }}"  name="province_id" placeholder="type something" required> 
					</div> 
					<div class="form-group">
						<label>Identity Number</label>
						<input type="text" class="form-control" value="{{ $biodatas->identify_number }}"  name="identify_number" placeholder="type something" required> 
					</div> 
					<button type="submit" class="btn btn-dark pull-right"><i class="fa fa-check"></i> Submit</button> 
					</form>
		<div class="col-2">
			
		</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
</section>
@endsection