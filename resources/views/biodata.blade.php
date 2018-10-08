@extends( 'layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Biodata</h2>
  </div>
</div>

<section>
    
<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    
                    <h5 class="pull-right">Biodata</h5>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        @method('put')
                        @csrf
                    <div class="form-group">
                            <img src="{{ asset('storage/uploads/avatars/default.png') }}" class="rounded mx-auto d-block" width="100">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nama Depan</label>
                        <input type="text" class="form-control" value=""  name="first_name" placeholder="type something" required> 
                    </div> 
                    <div class="form-group">
                        <label>Nama Belakang</label>
                        <input type="text" class="form-control" value=""  name="last_name" placeholder="type something" required> 
                    </div>
                    <div class="form-group">
                        <label>Provinsi</label>
                        <input type="text" class="form-control" value=""  name="province_id" placeholder="type something" required> 
                    </div> 
                    <div class="form-group">
                        <label>Nomer Identitas</label>
                        <input type="text" class="form-control" value=""  name="identify_number" placeholder="type something" required> 
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
                        <input type="text" class="form-control" value=""  name="first_name" placeholder="type something" required> 
                    </div> 
                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="text" class="form-control" value=""  name="last_name" placeholder="type something" required> 
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" value=""  name="province_id" placeholder="type something" required> 
                    </div> 
                    <div class="form-group">
                        <label>Kota</label>
                        <input type="text" class="form-control" value=""  name="identify_number" placeholder="type something" required> 
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
                        <a class="nav-link active" href="#profile" role="tab" data-toggle="tab">Achievement</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#buzz" role="tab" data-toggle="tab">Training</a>
                      </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                      <div role="tabpanel" class="tab-pane fade in active" id="profile">
                          <div class="row">
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
                        <input type="text" class="form-control" value=""  name="first_name" placeholder="type something" required> 
                    </div> 
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" value=""  name="last_name" placeholder="type something" required> 
                    </div>
                    <div class="form-group">
                        <label>Dekripsi</label>
                        <input type="text" class="form-control" value=""  name="province_id" placeholder="type something" required> 
                    </div> 
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="text" class="form-control" value=""  name="identify_number" placeholder="type something" required> 
                    </div> 
                   
                    </form>
        
                </div>
            </div>
        </div>
        <!-- -->
    </div>
                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="buzz">
                          <div class="row">
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
                        <input type="text" class="form-control" value=""  name="first_name" placeholder="type something" required> 
                    </div> 
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" value=""  name="last_name" placeholder="type something" required> 
                    </div>
                    <div class="form-group">
                        <label>Dekripsi</label>
                        <input type="text" class="form-control" value=""  name="province_id" placeholder="type something" required> 
                    </div> 
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="text" class="form-control" value=""  name="identify_number" placeholder="type something" required> 
                    </div> 
                   
                    </form>
        
                </div>
            </div>
        </div>
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