@extends('layouts.umkm')
@section('content')
<div class="page-header">
	<div class="container-fluid">
		<h2 class="h5 no-margin-bottom">UMKM</h2>
	</div>
</div>

<section>
	
	<div class="container">
		<form action="{{ route('umkmuser.store') }}" method="post">
			@csrf
			@method('post')
			<div class="row">
				<div class="col-6">
					<div class="card">
						<div class="card-header">
							<a href="{{ url('umkmuser') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Kembali</a>
							<h5 class="pull-right"> Isi Form</h5>
						</div>
						<div class="card-body"> 

							<div class="form-group">
								<label>User Id / Nick Name</label>
								<select class="form-control select2" name="user_id">
									@foreach ($users as $u => $user)
									<option value="{{ $user->id }}">{{ $user->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Kategori</label>
								<select class="form-control select2" name="umkm_category_id">
									@foreach ($umkm_categories as $uc => $umkmcategory)
									<option value="{{ $umkmcategory->id }}">{{ $umkmcategory->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Provinsi</label>
								<select class="form-control select2" name="state_id">
									@foreach ($states as $st => $state)
									<option value="{{ $state->id }}">{{ $state->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Kota</label>
								<select class="form-control select2" name="city_id">
									@foreach ($cities as $c => $city)
									<option value="{{ $city->id }}">{{ $city->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Distrik/Daerah</label>
								<select class="form-control select2" name="district_id">
									@foreach ($districts as $ds => $district)
									<option value="{{ $district->id }}">{{ $district->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Nama UMKM</label>
								<input type="text" class="form-control" name="name" placeholder="type something" required> 
							</div>
							<div class="form-group">
								<label>Deskripsi</label>
								<textarea type="text" class="form-control" name="description" placeholder="type something" > </textarea>
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<textarea type="text" class="form-control" name="address" placeholder="type something" > </textarea>
							</div>
							<div class="form-group">
								<label>Kontak Telepon / WA</label>
								<input type="text" class="form-control" name="cp" placeholder="type something" required> 
							</div>
							<div class="form-group">
								<label>web</label>
								<input type="text" class="form-control" name="web" placeholder="type something" required> 
							</div>
							<div class="form-group">
								<label>facebook</label>
								<input type="text" class="form-control" name="facebook" placeholder="type something" required> 
							</div>
							<div class="form-group">
								<label>Twitter</label>
								<input type="text" class="form-control" name="twitter" placeholder="type something" required> 
							</div>
							<div class="form-group">
								<label>Instagram</label>
								<input type="text" class="form-control" name="instagram" placeholder="type something" required> 
							</div> 
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="card">
						<div class="card-header">
							Biodata UMKM
						</div>
						<div class="card-body">
							<div class="form-group">
								<label>Pendiri</label>
								<input type="text" class="form-control" name="biodata[founder]" placeholder="type something" required>
							</div>
							<div class="form-group">
								<label>Tanggal </label>
								<input type="date" class="form-control" name="biodata[date_of_birth]" placeholder="type something" required> 
							</div>
							<div class="form-group">
								<label>Jumlah Anggota</label>
								<input type="text" class="form-control" name="biodata[total_employes]" placeholder="type something" required> 
							</div>
							<div class="form-group">
								<label>Keuangan Bulanan</label>
								<input type="text" class="form-control" name="biodata[monthly_finance]" placeholder="type something" required> 
							</div>
							<div class="form-group">
								<label>Is Has Hki</label>
								<input type="text" class="form-control" name="biodata[is_has_hki]" placeholder="type something" required> 
							</div>
							<div class="form-group">
								<label>Didanai</label>
								<input type="text" class="form-control" name="biodata[is_funded]" placeholder="type something" required> 
							</div>

						</div>
					</div>
				</div>
			</div>
			<product-component></product-component>
			<achivement-component></achivement-component>
			<training-component></training-component>
			<button type="submit" class="btn btn-success center-block btn-block"><i class="fa fa-check"></i> Simpan</button> 
		</form>
	</div>

</section>
@endsection