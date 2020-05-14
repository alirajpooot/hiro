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
            
            <h4 class="page-title">Edit News & Promotions</h4>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div>
<div class="container-fluid">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="float-left"><h4 class="mt-0 header-title">Edit Information of  News & Poromotion</h4></div>
            <div class="float-right"><a href="{{route('companies.details',[$data->company_id])}}" class="btn btn-primary">Back</a></div>
                <br>
                <div class="clearfix"></div>
                @if(!empty(session('successmsg'))) <div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     {{session('successmsg')}} </div> @endif
                <form method="post" action="{{route('companies.details.editpost')}}" enctype="multipart/form-data">
                        {{ csrf_field()}}
                     <input type="hidden" name="id" value="{{$data->id}}">
    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="username">News Title</label>
                            <input type="text" name="title" class="form-control" value="{{$data->title}}" id="username" required>
                            @if(!empty($errors->first('title'))) <span class="text-danger">{{$errors->first('title')}}</span> @endif
                        </div>
                    </div>
    
                        <div class="custom-file mb-3">
                            @if (!empty($data->featured_image))
                                <img src="{{url('public/assets/featuredimages')}}/{{$data->featured_image}}" width="200"alt="">
                            @endif
                            <input type="file" class="custom-file-input" name="featuredimg">
                            <input type="hidden" name="oldimage" value="{{$data->featured_image}}">
                            <label class="custom-file-label" for="customFile">Choose Featured Image</label>
                        </div>
                        <div class="col-md-12">
                            <label>Description</label>
                        <textarea id="elm1" name="description">{{$data->description}}</textarea>
                        </div>
                        <br>
                        <div class="col-md-12">                            
                            <div class="form-group">
                                <label for="message">Categories</label>
                                <select name="categories" class="select2 mb-3 select2-multiple" style="width: 100%"  data-placeholder="Choose" required>
                                   @forelse($cats as $cat)
                                <optgroup label="{{$cat->name}}">
                                    @forelse($cat->subCats as $subcat)
                                <option value="{{$subcat->id}}" @if($data->id == $subcat->id) selected="selected" @endif>{{$subcat->name}}</option>
                                    @empty
                                    @endforelse
                                    </optgroup> 
                                    @empty
                                    @endforelse
                                </select> 
                                @if(!empty($errors->first('categories'))) <span class="text-danger">{{$errors->first('categories')}}</span> @endif
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
<script src="{{ asset('public/admin/plugins/tinymce/tinymce.min.js')}}"></script>
<script src="{{ asset('public/admin/assets/pages/jquery.form-editor.init.js')}}"></script> 
@endpush