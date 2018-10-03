@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Districts</h2>
  </div>
</div>

<section>
    
<div class="container">
    <div class="row">
        <div class="offset-3 col-6">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('districts') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Back</a>
                    <h5 class="pull-right"> Fill the Form</h5>
                </div>
                <div class="card-body"> 
            
                   <form action="{{ route('districts.update',$districts->id) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="form-group">
                        <label>State</label>
                            <select class="form-control select2" name="city_id">
                                @foreach ($cities as $ct => $city)
                                <option value="{{ $city->id }}" {{$city->id==$districts->city_id ? 'selected':null}}> {{ $city->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" placeholder="type something" value="{{ $districts->name }}" required> 
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control" name="description" placeholder="type something" value="{{ $districts->description }}"> 
                        </div> 
                        <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> Submit</button> 
                    </form>
            
                </div>
            </div>
        </div>
    </div>
</div>
    
</section>
@endsection