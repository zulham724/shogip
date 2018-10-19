@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Kategori UMKM</h2>
  </div>
</div>

<section>
	
<div class="container">
	<div class="row">
		<div class="offset-3 col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('umkmlegalities') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Kembali</a>
					<h5 class="pull-right"> Isi Form</h5>
				</div>
				<div class="card-body"> 
					
					<form action="{{ route('umkmlegalities.store') }}" method="post">
					{{ csrf_field()}} 
						<div class="form-group">
							<label>Nama Legalitas</label>
							<input type="text" class="form-control" name="name" placeholder="type something" required> 
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