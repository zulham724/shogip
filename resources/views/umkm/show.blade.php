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
        <div class="col-12">
            <div class="page-header">
                <div class="container">
                  <ul class="nav nav-tabs" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" href="#profile" data-toggle="tab">Achievement</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#buzz" data-toggle="tab">Training</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#product" data-toggle="tab">Produk</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="profile">
                      <div class="row">
                        @foreach($umkm->umkmachievements as $index => $umkmachievement)
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">

                                    <h5 class="pull-right">Achievement</h5>
                                </div>

                                <div class="card-body">
                                    <form action="" method="post">
                                        @php
                                        setlocale (LC_TIME, 'ID');
                                        $date = strftime( "%d %B %Y", strtotime($umkmachievement->date));
                                        @endphp

                                        @method('put')
                                        @csrf
                                        {{-- <div class="form-group">
                                            <label>UMKM ID</label>
                                            <input type="text" class="form-control" value="{{ $umkmachievement->umkm_id }}"  name="id" placeholder="type something" required> 
                                        </div> --}} 
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" value="{{ $umkmachievement->name }}" readonly="true" name="name" placeholder="type something" required> 
                                        </div>
                                        <div class="form-group">
                                            <label>Dekripsi</label>
                                            <input type="text" class="form-control" value="{{ $umkmachievement->description }}" readonly="true" name="description" placeholder="type something" required> 
                                        </div> 
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <input type="text" class="form-control" value="{{ $date }}" readonly="true" name="date" placeholder="type something" required> 
                                        </div> 

                                    </form>

                                </div>

                            </div>
                        </div>
                        @endforeach
                        <!-- -->
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="buzz">
                  <div class="row">

                    @foreach($umkm->umkmatrainings as $index => $umkmatraining)                    
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">

                                <h5 class="pull-right">Training</h5>
                            </div>

                            <div class="card-body">
                                <form action="" method="post">
                                    @php
                                    setlocale (LC_TIME, 'ID');
                                    $date = strftime( "%d %B %Y", strtotime($umkmatraining->date));
                                    @endphp

                                    @method('put')
                                    @csrf
                                    {{-- <div class="form-group">
                                        <label>UMKM ID</label>
                                        <input type="text" class="form-control" value="{{ $umkmatraining->umkm_id }}"  name="id" placeholder="type something" required> 
                                    </div>  --}}
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" value="{{ $umkmatraining->name }}" readonly="true" name="name" placeholder="type something" required> 
                                    </div>
                                    <div class="form-group">
                                        <label>Dekripsi</label>
                                        <input type="text" class="form-control" value="{{ $umkmatraining->description }}" readonly="true" name="description" placeholder="type something" required> 
                                    </div> 
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="text" class="form-control" value="{{ $date }}" readonly="true" name="date" placeholder="type something" required> 
                                    </div> 

                                </form>

                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!--  -->
            <div role="tabpanel" class="tab-pane fade" id="product">
              <div class="container">
                <div class="row">
                        @foreach($umkm->products as $index => $product)
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    
                                    <h5 class="pull-right">Product</h5>
                                </div>
                                
                                <div class="card-body">
                                    <form action="" method="post">
                                        @method('put')
                                        @csrf
                                        {{-- <div class="form-group">
                                            <label>UMKM ID</label>
                                            <input type="text" class="form-control" value=""  name="id" placeholder="type something" required> 
                                        </div>  --}}
                                        <div class="form-group">
                                            <label>Nama Product</label>
                                            <input type="text" class="form-control" value="{{ $product->name }}" readonly="true" name="name" placeholder="type something" required> 
                                        </div>
                                        <label>Gambar</label>
                                        <div class="form-group">
                                            <div class="row">
                                                @foreach($product->product_images as $index => $product_image)
                                                    <div class="col-4">
                                                        <a class="zoom" rel="group" href="{{asset('storage/'.$product_image->image)}}">
                                                        <img src="{{asset('storage/'.$product_image->image)}}" width="100">
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                            
                                        </div>
                                         
                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <input type="text" class="form-control" value="{{ $product->description }}" readonly="true" name="description" placeholder="type something" required> 
                                        </div> 
                                        
                                    </form>
                                    
                                </div>
                                
                            </div>
                        </div>
                        @endforeach 
                </div> 
              </div>
                      
            </div>
                <!--  -->
        </div>
    </div>
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