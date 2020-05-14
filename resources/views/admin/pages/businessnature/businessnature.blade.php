@extends('admin.layout.master')
@section('description', 'Welcome to Admin Control Panel')
@section('title', 'Move Klang Admin Panel')
@push('css')
@include('admin.layout.datatable_css')
@endpush
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            
            <h4 class="page-title">Manage Business Types</h4>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div>
<div class="container-fluid">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Add New Business Type</h4>
                @if(!empty(session('successmsg'))) <div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     {{session('successmsg')}} </div> @endif
            <form method="post" action="{{ route('addbusinessnature') }}" enctype="multipart/form-data">
                {{ csrf_field()}}
                    <div class="col-md-6">
                        <div class="form-group col-lg-12">
                        <label for="type">Type Name</label>
                        <input type="text" class="form-control" name="type" placeholder="Enter Type Name">
                    <small class="text-danger">@if($errors->has('type')){{$errors->first('type')}}@endif</small>
                    </div>
                    </div>
                    
                <button type="submit" class="btn btn-gradient-primary">Submit</button>
            </form>                                           
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->

    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="col-sm-12" id="result"></div>
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($types as $type)
                        <tr>
                        <td><input id="type{{$type->id}}" name="type" value="{{$type->name}}" class="form-control"></td>
                        <td><button id="edittype" data="{{$type->id}}" title="Edit company information" class="btn btn-success"><i class="ti-save"></i></button> 
                        <a title="Activate the company" onclick="return confirm('Are you sure, you want to delete?');" href="{{route('deletebusinessnature',[$type->id])}}" class="btn btn-danger btn-small"><i class="ti ti-trash"></i></a>
                    </td>
                        </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                </table>        
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
    


</div>
</div>

@endsection

@push('js')
@include('admin.layout.datatable_js')
@endpush