@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Kategori UMKM</h2>
  </div>
</div>

<section>
    
<div class="container-fluid">
    <div class="card">
    	<div class="card-header">
    		<i class="fa fa-flag"></i> List Legalitas UMKM
    		<a href="{{ route('umkmlegalities.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah Legalitas</a>
    
    	</div>
    	<div class="card-body">
    		<div class="table-responsive">
    			<table class="table table-striped datatable">
    				<thead>
    					<tr>
    						<td>No</td>
    						<td>Legalitas</td>
    						<td>Aksi</td>
    					</tr>
    				</thead>
    				<tbody>
    					@foreach ($legality_lists as $l => $legality_list)
                        <tr>
                            <td>{{ $l+1 }}</td>
                            <td>{{ $legality_list->name }}</td>
                            <td>
                                <center>
                                <button type="submit" class="btn btn-danger" onclick="destroy({{$legality_list->id}})"><i class="fa fa-trash"></i> Hapus</button></td>
                                </center>
                        </tr>
                        @endforeach
    				</tbody>
    			</table>
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

                $.post("{{ url('umkmlegalities') }}/"+id,access)
                .done(res=>{
                    swal({
                        title:"Oke!",
                        text:"Anda menghapus Data Kategori UMKM",
                        type:"success"
                    }).then(result=>{
                        window.location = "{{ url('umkmlegalities') }}";
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