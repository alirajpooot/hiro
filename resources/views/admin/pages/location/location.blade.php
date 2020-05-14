@extends('admin.layout.master')
@section('description', 'Welcome to Admin Control Panel')
@section('title', 'Move Klang Admin Panel')
@push('css')
@include('admin.layout.forms_css')
@endpush
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            
            <h4 class="page-title">Manage News Locations</h4>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div>
<div class="container-fluid">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Add New Location</h4>
                @if(!empty(session('successmsg'))) <div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     {{session('successmsg')}} </div> @endif
            <form method="post" action="{{ route('add.loc') }}">
                {{ csrf_field()}}
                <div class="col-md-6">
                <div class="form-group col-lg-12">
                        <label class="mb-3">Parent Location</label>
                        <select name="parentloc" class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;">
                            <option value="0">Select</option>
                            @forelse($locs as $loc)
                        <option value="{{$loc->id}}">{{$loc->name}}</option>
                            @empty
                            @endforelse

                        </select>
                    </div> 
                </div>
                    <div class="col-md-6">
                        <div class="form-group col-lg-12">
                        <label for="exampleInputEmail1">Location</label>
                        <input type="text" class="form-control" name="location" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Location Name">
                    <small class="text-danger">@if($errors->has('location')){{$errors->first('location')}}@endif</small>
                    </div>
                    </div>
                    
                <button type="submit" class="btn btn-gradient-primary">Submit</button>
            </form>                                           
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->

    @forelse($locs as $key => $loc)
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
            <div class="float-left col-md-8">
                <h4 class="mt-0 header-title"><a class="btn btn-danger btn-block" data-toggle="collapse" href="#collapse{{$key}}" role="button" aria-expanded="false" aria-controls="collapse{{$key}}">{{$loc->name}}</a></h4></div>
                
            <div class="float-right"><a href="{{route('edit.locations', [$loc->id])}}"><i class="mdi mdi-pencil-outline"></i></a> <a onclick="return confirm('Are you sure to delete? It will delete sub categories as well')" href="{{route('delete.location', [$loc->id])}}"><i class="mdi mdi-trash-can-outline"></i></a>
                
                </div>
                    <div class="clearfix"></div>
                @forelse($loc->subLocs as $subloc)
            <div class="col-lg-12 collapse" id="collapse{{$key}}">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-left"><h4 class="mt-0 header-title">{{$subloc->name}}</h4></div>
                            <div class="float-right"><a href="{{route('edit.locations', [$subloc->id])}}"><i class="mdi mdi-pencil-outline"></i></a> <a href="{{route('delete.location', [$subloc->id])}}" onclick="return confirm('Are you sure to delete?')"><i class="mdi mdi-trash-can-outline"></i></a></div>
                        </div>
                    </div>
                </div>
                    @empty
                @endforelse
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
    @empty
    @endforelse
   


</div>
</div>

@endsection

@push('js')
@include('admin.layout.forms_js')
@endpush