@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Biodata</h2>
  </div>
</div>
<section>
    
<div class="container-fluid">
    <div class="card">
    	<div class="card-header">
    		<i class="fa fa-flag"></i> Biodata List
    		<a href="{{ route('biodatas.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add</a>
    	</div>
    	<div class="card-body">
    		<div class="table-responsive">
    			<table class="table table-striped datatable">
    				<thead>
    					<tr>
    						<td>No</td>
                            <td>First Name</td>
                            <td>Last Name</td>
                            <td>Provice</td>
                            <td>Identity Number</td>
                            <td>Action</td>
    					</tr>
    				</thead>
    				<tbody>
    		
                        @foreach ($biodatas as $b => $biodata)
                        <tr>
                            <td>{{ $b+1 }}</td>
                            <td>{{ $biodata->first_name }}</td>
                            <td>{{ $biodata->last_name }}</td>
                            <td>{{ $biodata->province_id }}</td>
                            <td>{{ $biodata->identify_number }}</td>
                            <td>
                               <center>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger" onclick="destroy({{$biodata->id}})"><i class="fa fa-trash"></i> Delete</button>
                                <a href="{{ route('biodatas.edit',$biodata->id) }}" type="button" class="btn btn-warning" ><i class="fa fa-gear"></i> Edit</a>
                                </div>
                                </center> 
                            </td>
                        </tr>
                        @endforeach
    				</tbody>
    			</table>
    		</div>
    	</div>
    </div>
</div>

</section>
@endsection
@section('script')
<script type="text/javascript">
    $(()=>{
        console.log("user page");
    });

    const destroy = (id)=>{
        swal({
            title:"Are you sure?",
            text:"You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(result=>{
            if(result.value){
                let access = {
                    id:id,
                    _method:'delete',
                    _token:"{{csrf_token()}}"
                }
                $.post("{{ url('biodatas') }}/"+id,access)
                .done(res=>{
                    console.log(res);
                    swal({
                        title:"Okay",
                        text:"You deleted data",
                        type:"success",
                    }).then(result=>{
                        window.location = "{{ url('biodatas') }}";
                    })
                }).fail(err=>{
                    console.log(err);
                }); 
            }
        });
    }

</script>
@endsection