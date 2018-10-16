@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Biodata UMKM</h2>
  </div>
</div>

<section>
	
<div class="container">
	<div class="row">
		<div class="offset-3 col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('umkmbiodatas') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Kembali</a>
					<h5 class="pull-right"> Isi Form</h5>
				</div>
				<div class="card-body"> 
					
					<form action="{{ route('umkmbiodatas.store') }}" method="post">
					@csrf
					@method('post')
						<div class="form-group">
						<label>Nama UMKM</label>
							<select class="form-control select2" name="umkm_id">
								@foreach ($umkm as $um => $umkms)
								<option value="{{ $umkms->id }}">{{ $umkms->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Tanggal </label>
							<input type="date" class="form-control" name="date_of_birth" placeholder="type something" required> 
						</div>
						<div class="form-group">
							<label>Pendiri</label>
							<input type="text" class="form-control" name="founder" placeholder="type something" required> 
						</div>
						<div class="form-group">
							<label>Jumlah Anggota</label>
							<input type="text" class="form-control" name="total_employes" placeholder="type something" required> 
						</div>
						<div class="form-group">
							<label>Keuangan Bulanan</label>
							<input type="text" class="form-control" name="monthly_finance" placeholder="type something" required> 
						</div>
						<div class="form-group">
							<label>Is Has Hki</label>
							<input type="text" class="form-control" name="is_has_hki" placeholder="type something" required> 
						</div>
						<div class="form-group">
							<label>Didanai</label>
							<input type="text" class="form-control" name="is_funded" placeholder="type something" required> 
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