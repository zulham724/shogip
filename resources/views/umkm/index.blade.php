@extends('layouts.admin')

@section('css')
<style type="text/css">
    @media print{
        button{
            visibility: hidden;
        }
        .hide {
            visibility: hidden;
        }
        a {
            visibility: hidden;
        }

    }
</style>
@endsection

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
            <a href="{{ route('umkms.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah UMKM</a>
            {{-- <button class="btn btn-primary pull-right" onclick="print()"><i class="fa fa-print"></i> Cetak</button> --}}
            <form class="form-inline" method="post" action="{{ url('umkm/document') }}">
                @csrf
                <div class="form-group">
                    {{-- <label>Sortir Kota</label> --}}
                    <select class="form-control" name="city_name">
                        <option value="">Semua UMKM</option>
                        @foreach ($cities as $city)
                            {{-- expr --}}
                            <option value="{{ $city->name }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" name="category_name">
                        <option value="">Semua Kategori</option>
                        @foreach ($umkm_categories as $umkm_category)
                            {{-- expr --}}
                            <option value="{{ $umkm_category->name }}">{{ $umkm_category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Cetak</button>
            </form>
            
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered datatable" id="print">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Nama UMKM</td>
                            <td>Email</td>
                            <td>Kategori UMKM</td>
                            <td>Kota</td>
                            <td>Kontak Telepon / WA</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($umkm as $um => $umkms)
                        <tr>
                            <td>{{ $um+1 }}</td>
                            <td>{{ $umkms->name }}</td>
                            <td>{{ $umkms->user->email }}</td>
                            <td>{{ $umkms->umkm_category->name }}</td>
                            <td>{{ $umkms->city->name }}</td>
                            <td>{{ $umkms->cp }}</td>
                            <td>
                                <a href="{{ route('umkms.edit',$umkms->id) }}" type="button" class="btn btn-secondary" ><i class="fa fa-pencil"></i> Edit</a>
                                <a type="button" class="btn btn-info" href="{{ route('umkms.show',$umkms->id) }}"><i class="fa fa-search"></i> Lihat</a>
                                <button type="submit" class="btn btn-danger" onclick="destroy({{$umkms->id}})"><i class="fa fa-trash"></i> Hapus</button>
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

                $.post("{{ url('umkms') }}/"+id,access)
                .done(res=>{
                    swal({
                        title:"Oke!",
                        text:"Anda menghapus Data UMKM",
                        type:"success"
                    }).then(result=>{
                        window.location = "{{ url('umkms') }}";
                    });
                })
                .fail(err=>{
                    // console.log(err);
                    swal("Oops","Something not right","error");
                });
            }
        });
    }

    function print(){
        axios.get('umkm/document').then(res=>{

        });
    }

</script>
@endsection