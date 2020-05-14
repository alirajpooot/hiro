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
            
            <h4 class="page-title">Manage Home Page Sliders</h4>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div>
<div class="container-fluid">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Add New Sliders</h4>
                @if(!empty(session('successmsg'))) <div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     {{session('successmsg')}} </div> @endif
            <form method="post" action="{{ route('sliderspost') }}" enctype="multipart/form-data">
                {{ csrf_field()}}
                    <div class="col-md-6">
                        <div class="form-group col-lg-12">
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" name="sliderimage" id="catimg">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <div class="">
                        <label class="sort" for="sort">Sorting</label>
                        <input type="number" class="form-control" min="1" name="sort" required>
                    </div>
                </div>
            </div>
                <button type="submit" class="btn btn-gradient-primary">Add New Slider</button>
            </form>                                           
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->


    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
            <div class="float-left col-md-8">
                <h4 class="mt-0 header-title">All Sliders</h4></div>
                @forelse ($sliders as $slider)
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-sm-6">
                        @if(!empty($slider->image)) <img class="img" width="550" src="{{url('public/assets/images/sliders')}}/{{$slider->image}}"> @endif 
                    </div>
                <div class="col-sm-2"><br> <input id="sort" data="{{$slider->id}}" value="{{$slider->sort}}" class="form-control" type="number" min="1" name="sort" class="form-controll" placeholder="Sort"></div>
                <div class="col-sm-2"><br>
                    <a onclick="return confirm('Are you sure to delete?');" class="btn btn-danger" href="{{route('sliderdelete',[$slider->id])}}">Delete</a></div>
                </div>
                <hr>
                    @empty
                    
                @endforelse
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->


</div>
</div>

@endsection

@push('js')
@include('admin.layout.forms_js')
@endpush