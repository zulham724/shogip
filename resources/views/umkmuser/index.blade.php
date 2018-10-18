@extends('layouts.umkm')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">UMKM</h2>
  </div>
</div>

<section>
    
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-flag"></i> List UMKM
            <a href="{{ route('umkmuser.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah</a>
            {{--  --}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped datatable">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Nama UMKM</td>
                            <td>Kategori UMKM</td>
                            <td>Provinsi</td>
                            <td>Kota</td>
                            <td>Distrik/Daerah</td>
                            <td>Deskripsi</td>
                            <td>Alamat</td>
                            <td>Kontak Telepon / WA</td>
                            <td>Web</td>
                            <td>Facebook</td>
                            <td>Twiiter</td>
                            <td>Instagram</td>
                            <!-- <td>Latitude</td>
                            <td>Longitude</td> -->
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach ($umkm as $um => $umkms)
                        <tr>
                            <td>{{ $um+1 }}</td>
                            <td>{{ $umkms->name }}</td>
                            <td>{{ $umkms->umkm_category->name }}</td>
                            <td>{{ $umkms->state->name }}</td>
                            <td>{{ $umkms->city->name }}</td>
                            <td>{{ $umkms->district->name }}</td>
                            <td>{{ $umkms->description }}</td>
                            <td>{{ $umkms->address }}</td>
                            <td>{{ $umkms->cp }}</td>
                            <td>{{ $umkms->web }}</td>
                            <td>{{ $umkms->facebook }}</td>
                            <td>{{ $umkms->twitter }}</td>
                            <td>{{ $umkms->instagram }}</td>
                              <td>
                                 <center>
                                   {{--  <a href="{{ route('umkmuser.show',$umkms->id) }}" type="button" class="btn btn-secondary" ><i class="fa fa-search"></i> Lihat</a> --}}
                                    <a href="{{ route('umkmuser.edit',$umkms->id) }}" type="button" class="btn btn-secondary" ><i class="fa fa-pencil"></i> Edit</a>
                                <button type="submit" class="btn btn-danger" onclick="destroy({{$umkms->id}})"><i class="fa fa-trash"></i> Hapus</button>
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

                $.post("{{ url('umkmuser') }}/"+id,access)
                .done(res=>{
                    swal({
                        title:"Okay!",
                        text:"You deleted product",
                        type:"success"
                    }).then(result=>{
                        window.location = "{{ url('umkmuser') }}";
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