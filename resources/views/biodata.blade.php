@extends( 'layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Biodata</h2>
  </div>
</div>

<section>
    
<div class="container">
    <button class="btn btn-info" onclick="window.history.back()"><i class="fa fa-arrow-left"></i></button>
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
                        <input type="text" class="form-control" value="{{ $umkm->user->biodata->first_name }}"  name="first_name" value="" placeholder="type something" required> 
                    </div> 
                    <div class="form-group">
                        <label>Nama Belakang</label>
                        <input type="text" class="form-control" value="{{ $umkm->user->biodata->last_name }}"  name="last_name" placeholder="type something" required> 
                    </div>
                    <div class="form-group">
                        <label>Provinsi</label>
                        <input type="text" class="form-control" value="{{ $umkm->user->biodata->province_id }}"  name="province_id" placeholder="type something" required> 
                    </div> 
                    <div class="form-group">
                        <label>Nomer Identitas</label>
                        <input type="text" class="form-control" value="{{ $umkm->user->biodata->identify_number }}"  name="identify_number" placeholder="type something" required> 
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
                        <input type="text" class="form-control" value="{{ $umkm->name }}"  name="first_name" placeholder="type something" required> 
                    </div> 
                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="text" class="form-control" value="{{ $umkm->cp }}"  name="cp" placeholder="type something" required> 
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" value="{{ $umkm->address }}"  name="address" placeholder="type something" required> 
                    </div> 
                    <div class="form-group">
                        <label>Kota</label>
                        <input type="text" class="form-control" value="{{ $umkm->city->name }}"  name="city" placeholder="type something" required> 
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
                                            @method('put')
                                            @csrf
                                        <div class="form-group">
                                            <label>UMKM ID</label>
                                            <input type="text" class="form-control" value="{{ $umkmachievement->umkm_id }}"  name="id" placeholder="type something" required> 
                                        </div> 
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" value="{{ $umkmachievement->name }}"  name="name" placeholder="type something" required> 
                                        </div>
                                        <div class="form-group">
                                            <label>Dekripsi</label>
                                            <input type="text" class="form-control" value="{{ $umkmachievement->description }}"  name="description" placeholder="type something" required> 
                                        </div> 
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <input type="text" class="form-control" value="{{ $umkmachievement->date }}"  name="date" placeholder="type something" required> 
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
                        @method('put')
                        @csrf
                    <div class="form-group">
                        <label>UMKM ID</label>
                        <input type="text" class="form-control" value="{{ $umkmatraining->umkm_id }}"  name="id" placeholder="type something" required> 
                    </div> 
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" value="{{ $umkmatraining->name }}"  name="name" placeholder="type something" required> 
                    </div>
                    <div class="form-group">
                        <label>Dekripsi</label>
                        <input type="text" class="form-control" value="{{ $umkmatraining->description }}"  name="description" placeholder="type something" required> 
                    </div> 
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="text" class="form-control" value="{{ $umkmatraining->date }}"  name="date" placeholder="type something" required> 
                    </div> 
                   
                    </form>
        
                </div>
                
            </div>
        </div>
        @endforeach
    </div>
                      </div>
                      
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>
    
</section>
@endsection