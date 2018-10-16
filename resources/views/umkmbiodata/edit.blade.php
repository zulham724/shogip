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
					<h5 class="pull-right"> Edit Form</h5>
				</div>
				<div class="card-body"> 
					
					<form action="{{ route('umkmbiodatas.update',$umkm_biodatas->id) }}" method="post">
						@php
                                        setlocale (LC_TIME, 'ID');
                                        $date = strftime( "%d %B %Y", strtotime($umkm_biodatas->date_of_birth));
                                        @endphp
						@method('put')
						@csrf
						<div class="form-group">
						<label>Nama UMKM</label>
							<select class="form-control select2" name="umkm_id">
								@foreach ($umkm as $um => $umkms)
								<option value="{{ $umkms->id }}" {{$umkms->id==$umkm_biodatas->umkm_id ? 'selected':null}}>{{ $umkms->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Tanggal</label>
							<input type="text" class="form-control" name="date_of_birth"  value="{{ $date }}"  required> 
						</div>
						<div class="form-group">
							<label>Pendiri</label>
							<input type="text" class="form-control" name="founder"  value="{{ $umkm_biodatas->founder }}"  required> 
						</div>
						<div class="form-group">
							<label>Jumlah Anggota</label>
							<input type="text" class="form-control" name="total_employes"  value="{{ $umkm_biodatas->total_employes }}"  required> 
						</div>
						<div class="form-group">
							<label>Keuangan Bulanan</label>
							<input type="text" class="form-control" name="monthly_finance"  value="{{ $umkm_biodatas->monthly_finance }}"  required> 
						</div>
						<div class="form-group">
							<label>Is Has Hki</label>
							<input type="text" class="form-control" name="is_has_hki"  value="{{ $umkm_biodatas->is_has_hki }}"  required> 
						</div>
						<div class="form-group">
							<label>Di Danai</label>
							<input type="text" class="form-control" name="is_funded"  value="{{ $umkm_biodatas->is_funded }}"  required> 
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