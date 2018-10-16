@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Achievement</h2>
  </div>
</div>

<section>
    
<div class="container-fluid">
    <div class="card">
    	<div class="card-header">
    		<i class="fa fa-flag"></i> List Achievement
    		<a href="{{ route('achievements.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah</a>
            
    	</div>
    	<div class="card-body">
    		<div class="table-responsive">
    			<table class="table table-striped datatable">
    				<thead>
    					<tr>
    						<td>No</td>
                            <td>Nama UMKM</td>
    						<td>Nama</td>
    						<td>Deskripsi</td>
                            <td>Tanggal</td>
    						<td>Aksi</td>
    					</tr>
    				</thead>
    				<tbody>
    					@foreach ($umkm_achievements as $a => $achievement)
                         @php
                                        setlocale (LC_TIME, 'ID');
                                        $date = strftime( "%d %B %Y", strtotime($achievement->date));
                                        @endphp

                        <tr>
                            <td>{{ $a+1 }}</td>
                            <td>{{ $achievement->umkm->name }}</td>
                            <td>{{ $achievement->name }}</td>
                            <td>{{ $achievement->description }}</td>
                            <td>{{ $date }}</td>
                              <td>
                                <center>
                                    <a href="{{ route('achievements.edit',$achievement->id) }}" type="button" class="btn btn-secondary" ><i class="fa fa-pencil"></i> Edit</a>
                                <button type="submit" class="btn btn-danger" onclick="destroy({{$achievement->id}})"><i class="fa fa-trash"></i> Hapus</button>
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

                $.post("{{ url('achievements') }}/"+id,access)
                .done(res=>{
                    swal({
                        title:"Oke!",
                        text:"Anda menghapus Data Achievement",
                        type:"success"
                    }).then(result=>{
                        window.location = "{{ url('achievements') }}";
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