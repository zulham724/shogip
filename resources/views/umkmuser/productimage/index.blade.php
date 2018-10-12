@extends('layouts.umkm')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Gambar Product</h2>
</div>
</div>

<section>

    <div class="container-fluid">
        <div class="card">
           <div class="card-header">
              <i class="fa fa-flag"></i> List Gambar Product
              <a href="{{ route('productimageuser.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add</a>

          </div>
          <div class="card-body">
              <div class="table-responsive">
                 <table class="table table-striped datatable">
                    <thead>
                       <tr>
                          <td>No</td>
                          <td>Nama Product</td>
                          <td>Gambar</td>
                          <td>Deskripsi</td>
                          <td>Action</td>
                      </tr>
                  </thead>
                  <tbody>
                        @foreach ($umkm->products as  $product)
                            @foreach($product->product_images as $u => $product_image)
                                <tr>
                                    <td>{{ $u+1 }}</td>
                                    <td>{{ $product->name }}</td>
                                    {{--  --}}
                                    <td><img src="{{ asset('storage/'.$product_image->image) }}" width="50"></td>
                                    <td>{{ $product_image->description }}</td>



                                    <td>
                                        <center>
                                            <button type="submit" class="btn btn-danger" onclick="destroy({{$product_image->id}})"><i class="fa fa-trash"></i> Delete</button>
                                        </center>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
            </tbody>
        </table>
        {{-- <!-- <small>Have a New Data State ? <a href="{{ url('states') }}">click here</a></small> --> --}}
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

                $.post("{{ url('productimageuser') }}/"+id,access)
                .done(res=>{
                    swal({
                        title:"Okay!",
                        text:"You deleted product",
                        type:"success"
                    }).then(result=>{
                        window.location = "{{ url('productimageuser') }}";
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