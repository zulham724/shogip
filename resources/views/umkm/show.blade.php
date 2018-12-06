@extends( 'layouts.admin')
@section('css')
<style type="text/css">
    @media print{
        button{
            visibility: hidden;
        }
        #hide {
            visibility: hidden;
        }
    }
</style>
@endsection
@section('content')
<div class="page-header">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Biodata</h2>
    </div>
</div>

<section>

    <div class="container" id="cek">
        <button class="btn btn-info" style="margin-bottom: 20px" onclick="window.history.back()"><i class="fa fa-arrow-left"></i> Kembali</button>

        <button class="btn btn-primary pull-right" onclick="print()"><i class="fa fa-print"></i> Cetak Halaman Ini</button>

        <div id="printl">
            
            <div class="alert alert-primary" role="alert">
              <h3><b><i class="fa fa-home"></i> Biodata User dan Data UMKM</b></h3>
            </div>
            {{-- umkm data and biodata user --}}
            <div class="row">

                <div class="col-sm">
                    <div class="card">
                        <div class="card-header">

                            <h5 class="pull-right">Biodata</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('users.update',$umkm->user->id) }}" enctype="multipart/form-data" files="true" method="post">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <img src="{{ $umkm->user->avatar != null ?  asset('storage/'.$umkm->user->avatar) : asset('storage/uploads/avatars/default.png') }}" class="rounded mx-auto d-block" width="100">
                                    <input type="file" name="avatar" class="form-control" id="hide">     
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success"> Ubah Gambar</button>     
                                </div>

                                <div class="form-group">
                                    <label>Nama Depan</label>
                                    <input type="text" class="form-control" value="{{ $umkm->user->name }}" readonly="true" name="first_name" value="" placeholder="type something" required> 
                                </div> 
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" value="{{ $umkm->user->email }}" readonly="true" name="last_name" placeholder="type something" required> 
                                </div>
                            
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card">
                        <div class="card-header">

                            <h5 class="pull-right">UMKM</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Kategori</label>
                                <input type="text" readonly class="form-control" value="{{ $umkm->umkm_category->name }}">
                            </div>
                            <div class="form-group">
                                <label>Nama UMKM</label>
                                <input type="text" class="form-control" value="{{ $umkm->name }}" readonly="true" name="first_name" placeholder="type something" required> 
                            </div> 
                            <div class="form-group">
                                <label>Varian</label>
                                <input type="text" class="form-control" readonly value="{{ $umkm->varian ?? 'kosong' }}">
                            </div>
                            <div class="form-group">
                                <label>Bentuk Usaha</label>
                                <input type="text" class="form-control" readonly value="{{ $umkm->business_form ?? 'kosong' }}">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" readonly>{{ $umkm->description ?? 'kosong' }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                <input type="text" class="form-control" value="{{ $umkm->cp ?? 0 }}" readonly="true" name="cp" placeholder="type something" required> 
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Kota</label>
                                <input type="text" class="form-control" value="{{ $umkm->city->name ?? 'kosong' }}" readonly="true" name="city" placeholder="type something" required> 
                            </div> 
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" value="{{ $umkm->address ?? 'kosong' }}" readonly="true" name="address" placeholder="type something" required> 
                            </div> 
                            <div class="form-group">
                                <label>Web</label>
                                <input type="text" class="form-control" value="{{ $umkm->web ?? 'kosong' }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Twitter</label>
                                <input type="text" class="form-control" value="{{ $umkm->twitter ?? 'kosong' }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Facebook</label>
                                <input type="text" class="form-control" value="{{ $umkm->facebook ?? 'kosong' }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Instagram</label>
                                <input type="text" class="form-control" value="{{ $umkm->instagram ?? 'kosong' }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div> {{-- end row --}}

            <div class="alert alert-primary" role="alert">
               <h3><b><i class="fa fa-user"></i> Biodata UMKM</b></h3>
            </div>
            {{-- umkm biodata --}}
            <div class="row">
                <div class="col-sm">
                    <div class="card">
                        <div class="card-header">
                            <b>UMKM Biodata</b>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Pendiri</label>
                                <input type="text" class="form-control" value="{{ $umkm->umkm_biodata->founder ?? 'kosong' }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nomor Identitas KTP</label>
                                <input type="text" class="form-control" value="{{ $umkm->umkm_biodata->identity_number ?? 'kosong' }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Pendidikan</label>
                                <input type="text" class="form-control" value="{{ $umkm->umkm_biodata->education ?? 'kosong' }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Tahun Berdiri</label>
                                <input type="text" class="form-control" value="{{ $umkm->umkm_biodata->year ?? 'kosong' }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Karyawan</label>
                                <input type="text" class="form-control" value="{{ $umkm->umkm_biodata->total_employes ?? 'kosong' }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Omset Bulanan</label>
                                <input type="text" class="form-control" value="Rp. {{ number_format($umkm->umkm_biodata->monthly_finance ?? 0,0,".",".") }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Total Asset</label>
                                <input type="text" class="form-control" value="Rp. {{ number_format($umkm->umkm_biodata->asset ?? 0,0,".",".") }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Kapasitas Produk Bulanan</label>
                                <input type="text" class="form-control" value="{{ $umkm->umkm_biodata->product_capacity ?? 'kosong' }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Wilayah Pemasaran Dalam Kota</label>
                                <input type="text" class="form-control" value="{{ $umkm->umkm_biodata->in_the_city ?? 'kosong' }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Regional</label>
                                <input type="text" class="form-control" value="{{ $umkm->umkm_biodata->regional ?? 'kosong' }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nasional</label>
                                <input type="text" class="form-control" value="{{ $umkm->umkm_biodata->national  ?? 'kosong'}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Internasional</label>
                                <input type="text" class="form-control" value="{{ $umkm->umkm_biodata->international ?? 'kosong' }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Modal Sendiri</label>
                                <input type="text" class="form-control" value="Rp. {{ number_format($umkm->umkm_biodata->capital ?? 0,0,".",".") }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama Bank/ Koperasi</label>
                                <input type="text" class="form-control" value="{{ $umkm->umkm_biodata->bank ?? 'kosong' }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Modal</label>
                                <input type="text" class="form-control" value="Rp. {{ number_format($umkm->umkm_biodata->ammount_of_capital ?? 0,0,".",".") }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Jangka Waktu Kredit (Tahun)</label>
                                <input type="text" class="form-control" value="{{ $umkm->umkm_biodata->credit_term ?? 'kosong' }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end row --}}

            <div class="alert alert-primary" role="alert">
              <h3><b><i class="fa fa-exclamation"></i> Permasalahan UMKM</b></h3>
            </div>
            {{-- umkm problem --}}
            <div class="row">
                @foreach ($umkm->umkm_problems as $umkm_problem)
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-header">
                                <h5>Masalah {{ $umkm_problem->problem_list->name }}</h5>
                            </div>
                            <div class="card-body">
                                <small>{{ $umkm_problem->description ?? 'Tidak ada masalah' }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="alert alert-primary" role="alert">
                <h3><b><i class="fa fa-archive"></i> Produk UMKM</b></h3>
            </div>
            {{-- umkm product --}}
            <div class="row">
                @foreach ($umkm->products as $product)
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-header">
                                Produk {{ $product->name }} <br>   
                                <p class="blockquote-footer">{{ $product->description }}</p>
                            </div>
                            <div class="card-body">
                                @foreach ($product->product_images as $product_image)
                                    {{-- expr --}}
                                    <img src="{{ asset('storage/'.$product_image->image) }}" class="img img-fluid img-responsive">
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div> {{-- end print div --}}
        
    </div>

</section>
@endsection
@section('script')
<script type="text/javascript">
    function print(){
        printJS({
            printable:'printl',
            type:'html',
            scanStyles:true,
            targetStyles:[*]
        });
    }
</script>
@endsection