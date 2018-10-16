@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Kota</h2>
  </div>
</div>

<section>
    
<div class="container-fluid">
    <div class="card">
    	<div class="card-header">
    		<i class="fa fa-flag"></i> List Kota
    		<a href="{{ route('cities.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah Kota</a>
            
    	</div>
    	<div class="card-body">
    		<div class="table-responsive">
    			<table class="table table-striped datatable">
    				<thead>
    					<tr>
    						<td>No</td>
                            <td>Provinsi</td>
    						<td>Kota</td>
    						<td>Deskripsi</td>
    						<td>Action</td>
    					</tr>
    				</thead>
    				<tbody>
    					@foreach ($cities as $c => $city)
    					<tr>
							<td>{{ $c+1 }}</td>
                            <td>{{ $city->state->name }}</td>
							<td>{{ $city->name }}</td>
							<td>{{ $city->description }}</td>
                              <td>
                                <center>
                                    <a href="{{ route('cities.edit',$city->id) }}" type="button" class="btn btn-secondary" ><i class="fa fa-pencil"></i> Edit</a>
                                <button type="submit" class="btn btn-danger" onclick="destroy({{$city->id}})"><i class="fa fa-trash"></i> Hapus</button>
                                </center>
                            </td>
						</tr>
						@endforeach
    				</tbody>
    			</table>
                 <!-- <small>Have a New Data State ? <a href="{{ url('states') }}">click here</a></small> -->
    		</div>
    	</div>
    </div>
</div>
    
</section>
@endsection

@section('script')
<script type="text/javascript">
    const destroy = (id)=>{
        swal({
            type:"warning",
            title:"Apa Kamu Yakin?",
            text:"Anda tidak akan dapat mengembalikan data ini!",
            showCancelButton:true,
            cancelButtonColor:"#d33",
            confirmButtonText:"Ya, hapus!",
            confirmButtonColor:"#3085d6"
        }).then(result=>{
            if(result.value){
                let access = {
                    id:id,
                    _method:"delete",
                    _token:"{{ csrf_token() }}"
                }

                $.post("{{ url('cities') }}/"+id,access)
                .done(res=>{
                    swal({
                        title:"Oke!",
                        text:"Anda menghapus Data Kota",
                        type:"success"
                    }).then(result=>{
                        window.location = "{{ url('cities') }}";
                    });
                })
                .fail(err=>{
                    // console.log(err);
                    swal("Oops","Something not right","error");
                });
            }
        });
    }
</script>
@endsection