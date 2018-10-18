@extends('layouts.umkm')
@section('content')
<div class="page-header">
	<div class="container-fluid">
		<h2 class="h5 no-margin-bottom">UMKM</h2>
	</div>
</div>

<section>
	
	<div class="container">
		<form action="{{ route('umkmuser.update',$umkm->id) }}" method="post">
			@method('put')
			@csrf
			<div class="row">
				<div class="col-6">
					<div class="card">
						<div class="card-header">
							<a href="{{ url('umkmuser') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Kembali</a>
							<h5 class="pull-right"> Edit UMKM</h5>
						</div>
						<div class="card-body"> 
							<div class="form-group">
								<label>User Id / Nick Name</label>
								<select class="form-control select2" name="umkm[user_id]" >
									<option value="{{$user->id}}">{{ $user->name }}</option>
								</select>
								
							</div>
							<div class="form-group">
								<label>Varian</label>
								<textarea type="text" class="form-control" name="umkm[varian]" placeholder="type something" >{{ $umkm->varian}} </textarea>
							</div>
							<div class="form-group">
								<label>Kategori UMKM</label>
								<select class="form-control select2" name="umkm[umkm_category_id]">
									@foreach ($umkm_categories as $uc => $umkmcategory)
									<option value="{{ $umkmcategory->id }}" {{$umkmcategory->id==$umkm->umkm_category_id ? 'selected':null}}> {{ $umkmcategory->name }} </option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Provinsi</label>
								<select class="form-control select2" name="umkm[state_id]">
									@foreach ($states as $st => $state)
									<option value="{{ $state->id }}" {{$state->id==$umkm->state_id ? 'selected':null}}>{{ $state->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Kota</label>
								<select class="form-control select2" name="umkm[city_id]">
									@foreach ($cities as $c => $city)
									<option value="{{ $city->id }}" {{$city->id==$umkm->city_id ? 'selected':null}}>{{ $city->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Distrik/Daerah</label>
								<select class="form-control select2" name="umkm[district_id]">
									@foreach ($districts as $d => $district)
									<option value="{{ $district->id }}" {{$district->id==$umkm->district_id ? 'selected':null}}>{{ $district->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Nama UMKM</label>
								<input type="text" class="form-control" name="umkm[name]"  value="{{ $umkm->name }}"  required> 
							</div>
							<div class="form-group">
								<label>Bentuk Usaha</label><br>
								<div class="row">
									<div class="col-4">
										<input type="radio" id="type" name="umkm[business_form]" value="cv" {{  $umkm->business_form == 'cv' ? 'checked' : '' }}> CV
									</div>
									<div class="col-4">
										<input type="radio" id="type" name="umkm[business_form]" value="pt"  {{  $umkm->business_form == 'pt' ? 'checked' : '' }}> PT
									</div>
									<div class="col-4">
										<input type="radio" id="type" name="umkm[business_form]" value="usaha dagang"  {{  $umkm->business_form == 'usaha dagang' ? 'checked' : '' }}> Usaha Dagang
									</div>
									<div class="col-4">
										<input type="radio" id="type" name="umkm[business_form]" value="perseorangan"  {{  $umkm->business_form == 'perseorangan' ? 'checked' : '' }}> Perseorangan
									</div>
									<div class="col-4">
										<input type="radio" id="type" name="umkm[business_form]" value="lainnya" { {{  $umkm->business_form == 'lainnya' ? 'checked' : '' }}> Lainnya
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
								<textarea type="text" class="form-control" name="umkm[description]" placeholder="type something">{{ $umkm->description}}</textarea>
							</div> 
							<div class="form-group">
								<label>Alamat</label>
								<textarea type="text" class="form-control" name="umkm[address]" placeholder="type something" >{{ $umkm->address}} </textarea>
							</div>
							<div class="form-group">
								<label>Kontak Telepon / WA</label>
								<input type="text" class="form-control" name="umkm[cp]"  value="{{ $umkm->cp }}"  required> 
							</div> 
							<div class="form-group">
								<label>Web</label>
								<input type="text" class="form-control" name="umkm[web]"  value="{{ $umkm->web }}"  required> 
							</div> 
							<div class="form-group">
								<label>Facebook</label>
								<input type="text" class="form-control" name="umkm[facebook]"  value="{{ $umkm->facebook }}"  required> 
							</div> 
							<div class="form-group">
								<label>Twitter</label>
								<input type="text" class="form-control" name="umkm[twitter]"  value="{{ $umkm->twitter }}"  required> 
							</div> 
							<div class="form-group">
								<label>Instagram</label>
								<input type="text" class="form-control" name="umkm[instagram]"  value="{{ $umkm->instagram }}"  required> 
							</div> 
						</div>
					</div>
				</div>
				<!--  -->
				<div class="col-6">
					<div class="card">
						<div class="card-header">
							Edit Biodata UMKM
						</div>
						<div class="card-body">
							<div class="form-group">
								<label>Pendiri</label>
								<input type="text" class="form-control" name="biodata[founder]" value="{{ $umkm->umkm_biodata->founder }}" placeholder="type something" required>
								</div>
								<div class="form-group">
									<label>No Identitas</label>
									<input type="text" class="form-control" name="biodata[identity_number]" placeholder="type something" value="{{ $umkm->umkm_biodata->identity_number }}"required>
								</div>
								<div class="form-group">
									<label>Pendidikan</label><br>
									<div class="row">
										<div class="col-4">
											<input type="radio" id="type" name="biodata[education]" value="SD" {{  $umkm->umkm_biodata->education == 'SD' ? 'checked' : '' }} > SD/Sederajat
										</div>
										<div class="col-4">
											<input type="radio" id="type" name="biodata[education]" value="SMP" {{  $umkm->umkm_biodata->education == 'SMP' ? 'checked' : '' }}> SMP/Sederajat
										</div>
										<div class="col-4">
											<input type="radio" id="type" name="biodata[education]" value="SMA" {{  $umkm->umkm_biodata->education == 'SMA' ? 'checked' : '' }}> SMA/Sederajat
										</div>
										<div class="col-4">
											<input type="radio" id="type" name="biodata[education]" value="D1-D3" {{  $umkm->umkm_biodata->education == 'D1-D3' ? 'checked' : '' }}> D1 - D3
										</div>
										<div class="col-4">
											<input type="radio" id="type" name="biodata[education]" value="S1" {{  $umkm->umkm_biodata->education == 'S1' ? 'checked' : '' }}> S1
										</div>
										<div class="col-4">
											<input type="radio" id="type" name="biodata[education]" value="S2" {{  $umkm->umkm_biodata->education == 'S2' ? 'checked' : '' }}> S2
										</div>
										<div class="col-4">
											<input type="radio" id="type" name="biodata[education]" value="S3" {{  $umkm->umkm_biodata->education == 'S3' ? 'checked' : '' }}> S3
										</div>
										<div class="col-4">
											<input type="radio" id="type" name="biodata[education]" value="lainnya" {{  $umkm->umkm_biodata->education == 'lainnya' ? 'checked' : '' }}> Lainnya
										</div>										
									</div>
								</div>
								<div class="form-group">
									<label>Tahun Berdiri </label>
									<input type="text" class="form-control" name="biodata[year]" value="{{ $umkm->umkm_biodata->year }}" placeholder="type something" required> 
								</div>
								<div class="form-group">
								<label>Jumlah Anggota</label>
								<input type="text" class="form-control" name="biodata[total_employes]" value="{{ $umkm->umkm_biodata->total_employes }}" placeholder="type something" required> 
								</div>
								<div class="form-group">
									<label>Keuangan Bulanan</label>
									<input type="text" class="form-control" name="biodata[monthly_finance]" value="{{ $umkm->umkm_biodata->monthly_finance }}" placeholder="type something" required> 
								</div>
								<div class="form-group">
									<label>Aset</label>
									<input type="text" class="form-control" name="biodata[asset]" placeholder="type something" value="{{ $umkm->umkm_biodata->asset}}"> 
								</div>
								<div class="form-group">
								<label>Is Has Hki</label>
								<input type="text" class="form-control" name="biodata[is_has_hki]" value="{{ $umkm->umkm_biodata->is_has_hki }}" placeholder="type something" required> 
								</div>
								<div class="form-group">
									<label>Kapasitas Produ/Bulan</label>
									<input type="text" class="form-control" name="biodata[product_capacity]" placeholder="type something" 	value="{{ $umkm->umkm_biodata->product_capacity }}"> 
								</div>
									<div class="col-12">
										<div class="card">
											<div class="card-header">
												Wilayah pemasaran
											</div>
											<div class="card-body">

												<div class="form-group">
													<label>Dalam Kota</label>
													<input type="text" class="form-control" name="biodata[in_the_city]" placeholder="type something" value="{{ $umkm->umkm_biodata->in_the_city }}"> 
												</div>
												<div class="form-group">
													<label>Regional</label>
													<input type="text" class="form-control" name="biodata[regional]" placeholder="type something" value="{{ $umkm->umkm_biodata->regional }}"> 
												</div>
												<div class="form-group">
													<label>National</label>
													<input type="text" class="form-control" name="biodata[national]" placeholder="type something" value="{{ $umkm->umkm_biodata->national }}"> 
												</div>
												<div class="form-group">
													<label>International</label>
													<input type="text" class="form-control" name="biodata[international]" placeholder="type something" value="{{ $umkm->umkm_biodata->internatonal }}"> 
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
													<input type="text" class="form-control" name="biodata[capital]" placeholder="type something" value="{{ $umkm->umkm_biodata->capital }}"> 
												</div>
												<div class="form-group">
													<label>Nama Bank / Koperasi</label>
													<input type="text" class="form-control" name="biodata[bank]" placeholder="type something" value="{{ $umkm->umkm_biodata->bank }}"> 
												</div>
												<div class="form-group">
													<label>Jumlah Modal</label>
													<input type="text" class="form-control" name="biodata[ammount_of_capital]" placeholder="type something" value="{{ $umkm->umkm_biodata->ammount_of_capital }}"> 
												</div>
												<div class="form-group">
													<label>Jangka Waktu Kredit (Tahun)</label>
													<input type="text" class="form-control" name="biodata[credit_term]" placeholder="type something" value="{{ $umkm->umkm_biodata->credit_term }}"> 
												</div>
												*Isi sesuai data UMKM anda
											</div>
										</div>
									</div>

							</div>
						</div>
					</div>
			</div>
			<product-component v-bind:edit_products="{{ $umkm->products }}"></product-component>
			<achivement-component v-bind:edit_achivements="{{ $umkm->umkmachievements }}"></achivement-component>
			<training-component v-bind:edit_trainings="{{ $umkm->umkmatrainings }}"></training-component>
			<button type="submit" class="btn btn-success center-block btn-block"><i class="fa fa-check"></i> Simpan</button>
		</form>
	</div>

</section>
@endsection