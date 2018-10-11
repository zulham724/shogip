@extends( 'layouts.umkm')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Biodata</h2>
</div>
</div>

<section>
    {{-- {{dd($user)}} --}}

    <div class="container">
        <div class="row">

            <div class="col-6">
                <div class="card">
                    <div class="card-header">

                        <h5 class="pull-right">User</h5>
                    </div>
                    <div class="card-body">
                        
                        <div class="form-group">
                            <label>Nick Name</label>
                            <input type="text" class="form-control" value="{{$user->name}}"   name="first_name" value="" placeholder="type something" required> 
                        </div> 
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" value= "{{$user->email}} "   name="last_name" placeholder="type something" required> 
                        </div>
                        

                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="card-header">

                        <h5 class="pull-right">Biodata</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.update',Auth::user()->id) }}" enctype="multipart/form-data" files="true" method="post">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <img src="{{ $user->avatar != null ?  asset('storage/'.$user->avatar) : asset('storage/uploads/avatars/default.png') }}" class="rounded mx-auto d-block" width="100">
                                <input type="file" name="avatar" class="form-control">     
                            </div>                      
                        
                            <div class="form-group">
                                <label>Nama Depan</label>
                                <input type="text" class="form-control" value="{{$user->biodata->first_name}}"   name="first_name" value="" placeholder="type something" required> 
                            </div> 
                            <div class="form-group">
                                <label>Nama Belakang</label>
                                <input type="text" class="form-control" value= "{{$user->biodata->last_name}} "   name="last_name" required> 
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control" value="{{$user->biodata->birth_of_date}} "   name="birth_of_date" placeholder="type something" required> 
                            </div>
                            <div class="form-group">
                                <label>Provinsi</label>
                                <input type="text" class="form-control" value="{{$user->biodata->province_id}} "   name="province_id" placeholder="type something" required> 
                            </div> 
                            <div class="form-group">
                                <label>Provinsi</label>
                                <input type="text" class="form-control" value="{{$user->biodata->province_id}} "   name="province_id" placeholder="type something" required> 
                            </div> 
                            <div class="form-group">
                                <label>Kota</label>
                                <input type="text" class="form-control" value="{{$user->biodata->city_id}} "   name="city_id" placeholder="type something" required> 
                            </div> 
                            <div class="form-group">
                                <label>Wilayah</label>
                                <input type="text" class="form-control" value="{{$user->biodata->district_id}} "   name="district_id" placeholder="type something" required> 
                            </div> 
                            <div class="form-group">
                                <label>Nomor Identitas</label>
                                <input type="text" class="form-control" value="{{$user->biodata->identify_number}} "   name="identify_number" placeholder="type something" required> 
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> Submit</button> 
                                
                            </div>
                        </form>

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