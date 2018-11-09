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
								<label>User <i style="color:red">*</i></label>
								<select class="form-control select2" name="umkm[user_id]" required>
									@foreach ($users as $u => $user)
										<option value="{{ $user->id }}">{{ $user->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Kategori <i style="color:red">*</i></label>
								<select class="form-control select2" name="umkm[umkm_category_id]" required>
									@foreach ($umkm_categories as $uc => $umkmcategory)
										<option value="{{ $umkmcategory->id }}">{{ $umkmcategory->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Varian</label>
								<textarea type="text" class="form-control" name="umkm[varian]" placeholder="type something" > </textarea>
							</div>
							<form-province-component></form-province-component>
							<div class="form-group">
								<label>Nama UMKM <i style="color:red">*</i></label>
								<input type="text" class="form-control" name="umkm[name]" placeholder="type something" required> 
							</div>
							<div class="form-group">
								<label>Bentuk Usaha <i style="color:red">*</i></label><br>
								<div class="row">
									<div class="col-4">
										<input type="radio" id="type" name="umkm[business_form]" checked value="cv"> CV
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
								<label>Alamat <i style="color:red">*</i></label>
								<textarea type="text" class="form-control" name="umkm[address]" required placeholder="type something" > </textarea>
							</div>
							<div class="form-group">
								<label>Kontak Telepon / WA <i style="color:red">*</i></label>
								<input type="number" class="form-control" name="umkm[cp]" placeholder="type something" required> 
							</div>
							<div class="form-group">
								<label>web</label>
								<input type="text" class="form-control" name="umkm[web]" placeholder="type something"> 
							</div>
							<div class="form-group">
								<label>facebook</label>
								<input type="text" class="form-control" name="umkm[facebook]" placeholder="type something"> 
							</div>
							<div class="form-group">
								<label>Twitter</label>
								<input type="text" class="form-control" name="umkm[twitter]" placeholder="type something"> 
							</div>
							<div class="form-group">
								<label>Instagram</label>
								<input type="text" class="form-control" name="umkm[instagram]" placeholder="type something"> 
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
								<label>Pemilik <i style="color:red">*</i></label>
								<input type="text" class="form-control" name="biodata[founder]" placeholder="type something" required>
							</div>
							<div class="form-group">
								<label>No Identitas (Sesuai KTP) <i style="color:red">*</i></label>
								<input type="text" class="form-control" name="biodata[identity_number]" placeholder="type something" required>
							</div>
							<div class="form-group">
								<label>Pendidikan <i style="color:red">*</i></label><br>
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
										<input type="radio" id="type" name="biodata[education]" checked value="S1"> S1
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
								<label>Tahun Berdiri <i style="color:red">*</i></label>
								<input type="text" class="form-control" name="biodata[year]" placeholder="type something" required> 
							</div>
							<div class="form-group">
								<label>Jumlah Karyawan <i style="color:red">*</i></label>
								<input type="number" class="form-control" name="biodata[total_employes]" placeholder="type something" required> 
							</div>
							<div class="form-group">
								<label>Omset Bulanan /Rupiah <i style="color:red">*</i></label>
								<input type="number" class="form-control" name="biodata[monthly_finance]" placeholder="type something" required> 
							</div>
							<div class="form-group">
								<label>Aset /Rupiah <i style="color:red">*</i></label>
								<input type="number" class="form-control" name="biodata[asset]" placeholder="type something" required> 
							</div>
							<div class="form-group">
								<label>Kapasitas Produk/Bulan</label>
								<input type="number" class="form-control" name="biodata[product_capacity]" placeholder="type something"> 
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
											<label>Modal Sendiri</label>
											<input type="number" class="form-control" name="biodata[capital]" placeholder="type something"> 
										</div>
										<div class="form-group">
											<label>Nama Bank / Koperasi</label>
											<input type="text" class="form-control" name="biodata[bank]" placeholder="type something"> 
										</div>
										<div class="form-group">
											<label>Jumlah Modal</label>
											<input type="number" class="form-control" name="biodata[ammount_of_capital]" placeholder="type something"> 
										</div>
										<div class="form-group">
											<label>Jangka Waktu Kredit (Tahun)</label>
											<input type="number" class="form-control" name="biodata[credit_term]" placeholder="type something"> 
										</div>
										*Isi sesuai data UMKM anda
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
			<problem-component></problem-component>
			<product-component></product-component>
			<button type="submit" class="btn btn-success center-block btn-block"><i class="fa fa-check"></i> Simpan</button> 
		</form>
	</div>

</section>
@endsection