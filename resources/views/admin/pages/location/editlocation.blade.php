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
            
            <h4 class="page-title">Manage Locations</h4>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div>
<div class="container-fluid">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Edit Location Information</h4>
                @if(!empty(session('successmsg'))) <div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     {{session('successmsg')}} </div> @endif
            <form method="post" action="{{ route('edit.loc') }}">
                {{ csrf_field()}}
            <input type="hidden" name="id" value="{{$locd->id}}">
                <div class="form-group col-lg-12">
                    <div class="col-md-6">
                        <label class="mb-3">Single select</label>
                        <select name="parentloc" id="select2" class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;">
                            <option value="0">Select</option>

                            @forelse($locs as $loc)
                        <option value="{{$loc->id}}" @if($locd->parent_id==$loc->id) selected="selected" @endif>{{$loc->name}}</option>
                            @empty
                            @endforelse

                        </select>
                    </div> <br>
                    <div class="col-md-6">
                        <label for="exampleInputEmail1">Location Name</label>
                    <input type="text" class="form-control" name="location" value="{{$locd->name}}" placeholder="Enter Location Name">
                    <small class="text-danger">@if($errors->has('location')){{$errors->first('location')}}@endif</small>
                    </div>
                </div>
                <button type="submit" class="btn btn-gradient-primary">Submit</button>
            </form>                                           
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->



</div>
</div>

@endsection

@push('js')
@include('admin.layout.forms_js')
@endpush