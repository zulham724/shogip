@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Achievement</h2>
  </div>
</div>

<section>
	
<div class="container">
	<div class="row">
		<div class="offset-3 col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('achievements') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Kembali</a>
					<h5 class="pull-right"> Edit Form</h5>
				</div>
				<div class="card-body"> 
					
					<form action="{{ route('achievements.update',$umkm_achievements->id) }}" method="post">
						 @php
                                        setlocale (LC_TIME, 'ID');
                                        $date = strftime( "%d %B %Y", strtotime($umkm_achievements->date));
                                        @endphp

						@method('put')
						@csrf
						<div class="form-group">
						<label>Nama UMKM</label>
							<select class="form-control select2" name="umkm_id">
								@foreach ($umkm as $um => $umkms)
								<option value="{{ $umkms->id }} " {{$umkms->id==$umkm_achievements->umkm_id ? 'selected':null}}> {{ $umkms->name }} </option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Nama</label>
							<input type="text" class="form-control" name="name"  value="{{ $umkm_achievements->name }}"  required> 
						</div>
						<div class="form-group">
							<label>Deskripsi</label>
							<textarea type="text" class="form-control" name="description" placeholder="type something">{{ $umkm_achievements->description}}</textarea>
						</div> 
						<div class="form-group">
							<label>Tanggal</label>
							<input type="text" class="form-control" name="date"  value="{{ $date }}"  required> 
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