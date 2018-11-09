@extends( 'layouts.admin')
@section('content')
<div class="page-header">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Biodata</h2>
    </div>
</div>

<section>

    <div class="container">
        <button class="btn btn-info" style="margin-bottom: 20px" onclick="window.history.back()"><i class="fa fa-arrow-left"></i> Kembali</button>
        <div class="row">

            <div class="col-4">
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
                                <input type="file" name="avatar" class="form-control">     
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success"> Ubah Gambar</button>     
                            </div>
                        </form>

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
        <div class="col-8">
            <div class="card">
                <div class="card-header">

                    <h5 class="pull-right">UMKM</h5>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        @method('put')
                        @csrf

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" value="{{ $umkm->name }}" readonly="true" name="first_name" placeholder="type something" required> 
                        </div> 
                        <div class="form-group">
                            <label>Nomor Telepon</label>
                            <input type="text" class="form-control" value="{{ $umkm->cp }}" readonly="true" name="cp" placeholder="type something" required> 
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" value="{{ $umkm->address }}" readonly="true" name="address" placeholder="type something" required> 
                        </div> 
                        <div class="form-group">
                            <label>Kota</label>
                            <input type="text" class="form-control" value="{{ $umkm->city->name }}" readonly="true" name="city" placeholder="type something" required> 
                        </div> 

                    </form>

                </div>
            </div>
        </div>
        
    </div>

</section>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $(".zoom").fancybox();
    });
</script>
@endsection