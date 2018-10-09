@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Biodata UMKM</h2>
  </div>
</div>

<section>
    
<div class="container-fluid">
    <div class="card">
    	<div class="card-header">
    		<i class="fa fa-flag"></i> Biodata List
    		<a href="{{ route('umkmbiodatas.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add</a>
            
    	</div>
    	<div class="card-body">
    		<div class="table-responsive">
    			<table class="table table-striped datatable">
    				<thead>
    					<tr>
    						<td>No</td>
                            <td>Nama UMKM</td>
    						<td>Tanggal</td>
    						<td>Pendiri</td>
                            <td>Jumlah Anggota</td>
                            <td>Keuangan Bulanan</td>
                            <td>Is Has Hki</td>
                            <td>Di Danai</td>
    						<td>Action</td>
    					</tr>
    				</thead>
    				<tbody>
    					@foreach ($umkm_biodatas as $c => $umkmbiodata)
                        <tr>
                            <td>{{ $c+1 }}</td>
                            <td>{{ $umkmbiodata->umkm->name }}</td>
                            <td>{{ $umkmbiodata->date_of_birth }}</td>
                            <td>{{ $umkmbiodata->founder }}</td>
                            <td>{{ $umkmbiodata->total_employes }}</td>
                            <td>{{ $umkmbiodata->monthly_finance }}</td>
                            <td>{{ $umkmbiodata->is_has_hki }}</td>
                            <td>{{ $umkmbiodata->is_funded }}</td>
                              <td>
                                <center>
                                    <a href="{{ route('umkmbiodatas.edit',$umkmbiodata->id) }}" type="button" class="btn btn-secondary" ><i class="fa fa-pencil"></i> Edit</a>
                                <button type="submit" class="btn btn-danger" onclick="destroy({{$umkmbiodata->id}})"><i class="fa fa-trash"></i> Delete</button>
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
            title:"Are you sure?",
            text:"You won't be able to revert this!",
            showCancelButton:true,
            cancelButtonColor:"#d33",
            confirmButtonText:"Yes, delete it!",
            confirmButtonColor:"#3085d6"
        }).then(result=>{
            if(result.value){
                let access = {
                    id:id,
                    _method:"delete",
                    _token:"{{ csrf_token() }}"
                }

                $.post("{{ url('umkmbiodatas') }}/"+id,access)
                .done(res=>{
                    swal({
                        title:"Okay!",
                        text:"You deleted product",
                        type:"success"
                    }).then(result=>{
                        window.location = "{{ url('umkmbiodatas') }}";
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