@extends('layouts.umkm')
@section('content')
<div class="page-header">
	<div class="container-fluid">
		<h2 class="h5 no-margin-bottom">Gambar Product</h2>
	</div>
</div>

<section>
	
	<div class="container">
		<form action="{{ route('productimageuser.store') }}" enctype="multipart/form-data" files="true" method="post">
			@csrf
			@method('post')
			<div class="row">
				<div class=" col-12">
					<div class="card">
						<div class="card-header">
							<a href="{{ url('productimageuser') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Back</a>
							<h5 class="pull-right"> Fill the Form</h5>
						</div>
						<productimage-component></productimage-component>
						<button type="submit" class="btn btn-success center-block btn-block"><i class="fa fa-check"></i> Submit</button>
					</div>
				</div>
			</div>
		</form>
	</div>
	
</section>
@endsection