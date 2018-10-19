@extends('layouts.admin')
@section('content')
<div class="page-header">
	<div class="container-fluid">
		<h2 class="h5 no-margin-bottom">UMKM</h2>
	</div>
</div>

<section>
	
	<div class="container">
		<form action="{{ route('umkms.store') }}" method="post">
			@csrf
			@method('post')
			<div class="row">
				<div class="col-6">
					<div class="card">
						<div class="card-header">
							<a href="{{ url('umkms') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Kembali</a>
							<h5 class="pull-right"> Isi Form</h5>
						</div>
						<div class="card-body"> 

							<div class="form-group">
								<label>User</label>
								<select class="form-control select2" name="umkm[user_id]">
									@foreach ($users as $u => $user)
									<option value="{{ $user->id }}">{{ $user->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Kategori</label>
								<select class="form-control select2" name="umkm[umkm_category_id]">
									@foreach ($umkm_categories as $uc => $umkmcategory)
									<option value="{{ $umkmcategory->id }}">{{ $umkmcategory->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Varian</label>
								<textarea type="text" class="form-control" name="umkm[varian]" placeholder="type something" > </textarea>
							</div>
							<div class="form-group">
								<label>Provinsi</label>
								<select class="form-control select2" name="umkm[state_id]">
									@foreach ($states as $st => $state)
									<option value="{{ $state->id }}">{{ $state->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Kota</label>
								<select class="form-control select2" name="umkm[city_id]">
									@foreach ($cities as $c => $city)
									<option value="{{ $city->id }}">{{ $city->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Distrik/Daerah</label>
								<select class="form-control select2" name="umkm[district_id]">
									@foreach ($districts as $ds => $district)
									<option value="{{ $district->id }}">{{ $district->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Nama UMKM</label>
								<input type="text" class="form-control" name="umkm[name]" placeholder="type something" required> 
							</div>
							<div class="form-group">
								<label>Bentuk Usaha</label><br>
								<div class="row">
									<div class="col-4">
										<input type="radio" id="type" name="umkm[business_form]" value="cv"> CV
									</div>
									<div class="col-4">
										<input type="radio" id="type" name="umkm[business_form]" value="pt"> PT
									</div>
									<div class="col-4">
										<input type="radio" id="type" name="umkm[business_form]" value="usaha dagang"> Usaha Dagang
									</div>
									<div class="col-4">
										<input type="radio" id="type" name="umkm[business_form]" value="perseorangan"> Perseorangan
									</div>
									<div class="col-4">
										<input type="radio" id="type" name="umkm[business_form]" value="lainnya"> Lainnya
									</div>										
								</div>
							</div>
							<div class="form-group">
								<label>Legalitas</label><br>
								<div class="row">
									@foreach ($legality_lists as $legality_list)
									<div class="col-4">
										<input type="checkbox" id="type" name="umkm_legalities[][legality_list_id]" value="{{ $legality_list->id }}"> {{ $legality_list->name }}
									</div>
									@endforeach
								</div>
							</div>
							<div class="form-group">
								<label>Deskripsi</label>
								<textarea type="text" class="form-control" name="umkm[description]" placeholder="type something" > </textarea>
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<textarea type="text" class="form-control" name="umkm[address]" placeholder="type something" > </textarea>
							</div>
							<div class="form-group">
								<label>Kontak Telepon / WA</label>
								<input type="text" class="form-control" name="umkm[cp]" placeholder="type something" required> 
							</div>
							<div class="form-group">
								<label>web</label>
								<input type="text" class="form-control" name="umkm[web]" placeholder="type something" required> 
							</div>
							<div class="form-group">
								<label>facebook</label>
								<input type="text" class="form-control" name="umkm[facebook]" placeholder="type something" required> 
							</div>
							<div class="form-group">
								<label>Twitter</label>
								<input type="text" class="form-control" name="umkm[twitter]" placeholder="type something" required> 
							</div>
							<div class="form-group">
								<label>Instagram</label>
								<input type="text" class="form-control" name="umkm[instagram]" placeholder="type something" required> 
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
								<label>No Identitas</label>
								<input type="text" class="form-control" name="biodata[identity_number]" placeholder="type something" required>
							</div>
							<div class="form-group">
								<label>Pendidikan</label><br>
								<div class="row">
									<div class="col-4">
										<input type="radio" id="type" name="biodata[education]" value="SD"> SD/Sederajat
									</div>
									<div class="col-4">
										<input type="radio" id="type" name="biodata[education]" value="SMP"> SMP/Sederajat
									</div>
									<div class="col-4">
										<input type="radio" id="type" name="biodata[education]" value="SMA"> SMA/Sederajat
									</div>
									<div class="col-4">
										<input type="radio" id="type" name="biodata[education]" value="D1-D3"> D1 - D3
									</div>
									<div class="col-4">
										<input type="radio" id="type" name="biodata[education]" value="S1"> S1
									</div>
									<div class="col-4">
										<input type="radio" id="type" name="biodata[education]" value="S2"> S2
									</div>
									<div class="col-4">
										<input type="radio" id="type" name="biodata[education]" value="S3"> S3
									</div>
									<div class="col-4">
										<input type="radio" id="type" name="biodata[education]" value="lainnya"> Lainnya
									</div>										
								</div>
							</div>
							<div class="form-group">
								<label>Tahun Berdiri </label>
								<input type="text" class="form-control" name="biodata[year]" placeholder="type something" required> 
							</div>
							<div class="form-group">
								<label>Jumlah Anggota</label>
								<input type="text" class="form-control" name="biodata[total_employes]" placeholder="type something"> 
							</div>
							<div class="form-group">
								<label>Keuangan Bulanan</label>
								<input type="text" class="form-control" name="biodata[monthly_finance]" placeholder="type something"> 
							</div>
							<div class="form-group">
								<label>Aset</label>
								<input type="text" class="form-control" name="biodata[asset]" placeholder="type something" > 
							</div>
							<div class="form-group">
								<label>Is Has Hki</label>
								<input type="text" class="form-control" name="biodata[is_has_hki]" placeholder="type something" > 
							</div>
							<div class="form-group">
								<label>Kapasitas Produk/Bulan</label>
								<input type="text" class="form-control" name="biodata[product_capacity]" placeholder="type something"> 
							</div>
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										Wilayah pemasaran
									</div>
									<div class="card-body">

										<div class="form-group">
											<label>Dalam Kota</label>
											<input type="text" class="form-control" name="biodata[in_the_city]" placeholder="type something"> 
										</div>
										<div class="form-group">
											<label>Regional</label>
											<input type="text" class="form-control" name="biodata[regional]" placeholder="type something"> 
										</div>
										<div class="form-group">
											<label>National</label>
											<input type="text" class="form-control" name="biodata[national]" placeholder="type something"> 
										</div>
										<div class="form-group">
											<label>International</label>
											<input type="text" class="form-control" name="biodata[international]" placeholder="type something"> 
										</div>
										*Isi sesuai data UMKM anda
									</div>
								</div>
							</div>
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										Jenis Permodalan
									</div>
									<div class="card-body">

										<div class="form-group">
											<label>Moda Sendiri</label>
											<input type="text" class="form-control" name="biodata[capital]" placeholder="type something"> 
										</div>
										<div class="form-group">
											<label>Nama Bank / Koperasi</label>
											<input type="text" class="form-control" name="biodata[bank]" placeholder="type something"> 
										</div>
										<div class="form-group">
											<label>Jumlah Modal</label>
											<input type="text" class="form-control" name="biodata[ammount_of_capital]" placeholder="type something"> 
										</div>
										<div class="form-group">
											<label>Jangka Waktu Kredit (Tahun)</label>
											<input type="text" class="form-control" name="biodata[credit_term]" placeholder="type something"> 
										</div>
										*Isi sesuai data UMKM anda
									</div>
								</div>
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