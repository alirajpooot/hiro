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
            
            <h4 class="page-title">Manage News & Promotions</h4>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div>
<div class="container-fluid">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">List of all News & Poromotion</h4>
                <br>
                @if(!empty(session('successmsg'))) <div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     {{session('successmsg')}} </div> @endif
            
                <div class="row">
                    @forelse ($news as $new)
                    <div class="col-md-6 col-lg-3">
                        <div class="card card-border">
                        <img class="card-img-top img-fluid" src="{{url('public/assets/featuredimages')}}/{{$new->featured_image}}" alt="featued image">
                            <div class="card-body">
                            <h5 class="card-title mt-0">{{$new->title}}</h5>
                            <a href="{{route('companies.details.edit',[$new->id])}}" title="Edit information" class="btn btn-gradient-primary"><i class="ti ti-pencil-alt"></i></a>
                            @if($new->status == 1) <a href="{{route('companies.details.addeactive',[$new->id])}}" title="Deactivate ad" class="btn btn-gradient-info"><i class="ti ti-close"></i></a> 
                                @else 
                            <a href="{{route('companies.details.adactive', [$new->id])}}" title="Activate ad" class="btn btn-gradient-success"><i class="ti ti-check-box"></i></a> 
                                @endif  
                            <a href="{{route('companies.details.addelete',[$new->id])}}" title="Permanently Delete this ad" class="btn btn-gradient-danger"><i class="ti ti-trash"></i></a>   
                            </div><!--end card -body-->
                        </div><!--end card-->
                    </div><!--end col-->
                    @empty
                        
                    @endforelse            
                
                </div>
                                                      
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->

    
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Add News / Promotion</h4>
                <form method="post" action="{{ route('companies.addnewspost') }}" enctype="multipart/form-data">
                    {{ csrf_field()}}
                <input type="hidden" name="id" value="{{$data->id}}">

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="username">News Title</label>
                        <input type="text" name="title" class="form-control" value="{{old('title')}}" id="username" required>
                        @if(!empty($errors->first('title'))) <span class="text-danger">{{$errors->first('title')}}</span> @endif
                    </div>
                </div>

                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" name="featuredimg">
                        <label class="custom-file-label" for="customFile">Choose Featured Image</label>
                    </div>
                    <div class="col-md-12">
                        <label>Description</label>
                        <textarea id="elm1" name="description"></textarea>
                    </div>
                    <br>
                    <div class="col-md-12">                            
                        <div class="form-group">
                            <label for="message">Categories</label>
                            <select name="categories" class="select2 mb-3 select2-multiple" style="width: 100%"  data-placeholder="Choose" required>
                               @forelse($cats as $cat)
                            <optgroup label="{{$cat->name}}">
                                @forelse($cat->subCats as $subcat)
                            <option value="{{$subcat->id}}">{{$subcat->name}}</option>
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