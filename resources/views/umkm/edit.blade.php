@extends('layouts.admin')
@section('content')
<div class="page-header">
	<div class="container-fluid">
		<h2 class="h5 no-margin-bottom">UMKM</h2>
	</div>
</div>

<section>
	
	<div class="container">
		<form action="{{ route('umkms.update',$umkm->id) }}" method="post">
			@method('put')
			@csrf
			<div class="row">
				<div class="col-6">
					<div class="card">
						<div class="card-header">
							<a href="{{ url('umkms') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Back</a>
							<h5 class="pull-right"> Fill Edit UMKM</h5>
						</div>
						<div class="card-body"> 
							<div class="form-group">
								<label>Kategori UMKM</label>
								<select class="form-control select2" name="umkm_category_id">
									@foreach ($umkm_categories as $uc => $umkmcategory)
									<option value="{{ $umkmcategory->id }}" {{$umkmcategory->id==$umkm->umkm_category_id ? 'selected':null}}> {{ $umkmcategory->name }} </option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Provinsi</label>
								<select class="form-control select2" name="state_id">
									@foreach ($states as $st => $state)
									<option value="{{ $state->id }}" {{$state->id==$umkm->state_id ? 'selected':null}}>{{ $state->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Kota</label>
								<select class="form-control select2" name="city_id">
									@foreach ($cities as $c => $city)
									<option value="{{ $city->id }}" {{$city->id==$umkm->city_id ? 'selected':null}}>{{ $city->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Distrik/Daerah</label>
								<select class="form-control select2" name="district_id">
									@foreach ($districts as $d => $district)
									<option value="{{ $district->id }}" {{$district->id==$umkm->district_id ? 'selected':null}}>{{ $district->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Nama UMKM</label>
								<input type="text" class="form-control" name="name"  value="{{ $umkm->name }}"  required> 
							</div>
							<div class="form-group">
								<label>Deskripsi</label>
								<textarea type="text" class="form-control" name="description" placeholder="type something">{{ $umkm->description}}</textarea>
							</div> 
							<div class="form-group">
								<label>Alamat</label>
								<textarea type="text" class="form-control" name="address" placeholder="type something" >{{ $umkm->address}} </textarea>
							</div>
							<div class="form-group">
								<label>Kontak Telepon / WA</label>
								<input type="text" class="form-control" name="cp"  value="{{ $umkm->cp }}"  required> 
							</div> 
							<div class="form-group">
								<label>Web</label>
								<input type="text" class="form-control" name="web"  value="{{ $umkm->web }}"  required> 
							</div> 
							<div class="form-group">
								<label>Facebook</label>
								<input type="text" class="form-control" name="facebook"  value="{{ $umkm->facebook }}"  required> 
							</div> 
							<div class="form-group">
								<label>Twitter</label>
								<input type="text" class="form-control" name="twitter"  value="{{ $umkm->twitter }}"  required> 
							</div> 
							<div class="form-group">
								<label>Instagram</label>
								<input type="text" class="form-control" name="instagram"  value="{{ $umkm->instagram }}"  required> 
							</div> 
						</div>
					</div>
				</div>
				<!--  -->
				<div class="col-6">
					<div class="card">
						<div class="card-header">
							Fill Edit Biodata UMKM
						</div>
						<div class="card-body">
							<div class="form-group">
								<label>Pendiri</label>
								<input type="text" class="form-control" name="biodata[founder]" value="{{ $umkm->umkm_biodata->founder }}" placeholder="type something" required>
							</div>
							<div class="form-group">
								<label>Tanggal </label>
								<input type="date" class="form-control" name="biodata[date_of_birth]" value="{{ $umkm->umkm_biodata->date_of_birth }}" placeholder="type something" required> 
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
								<label>Is Has Hki</label>
								<input type="text" class="form-control" name="biodata[is_has_hki]" value="{{ $umkm->umkm_biodata->is_has_hki }}" placeholder="type something" required> 
							</div>
							<div class="form-group">
								<label>Didanai</label>
								<input type="text" class="form-control" name="biodata[is_funded]" value="{{ $umkm->umkm_biodata->is_funded }}" placeholder="type something" required> 
							</div>

						</div>
					</div>
				</div>
			</div>
			<product-component v-bind:edit_products="{{ $umkm->products }}"></product-component>
			<achivement-component v-bind:edit_achivements="{{ $umkm->umkmachievements }}"></achivement-component>
			<training-component v-bind:edit_trainings="{{ $umkm->umkmatrainings }}"></training-component>
			<button type="submit" class="btn btn-success center-block btn-block"><i class="fa fa-check"></i> Submit</button>
		</form>
	</div>

</section>
@endsection