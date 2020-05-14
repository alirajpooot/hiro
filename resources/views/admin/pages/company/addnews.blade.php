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
                <h4 class="mt-0 header-title">Add New News / Promotion</h4>
                @if(!empty(session('successmsg'))) <div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     {{session('successmsg')}} </div> @endif
            <form method="post" action="{{ route('news.add.cat') }}" enctype="multipart/form-data">
                {{ csrf_field()}}
                <div class="col-md-6">
                <div class="form-group col-lg-12">
                <label class="mb-3">Single select</label>
                        <select name="parentcat" class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;">
                            <option>Select</option>
                            @forelse ($comps as $comp)
                        <option value="{{$comp->id}}">{{$comp->company_name}}</option>
                            @empty
                                
                            @endforelse
                        </select>
                    </div> 
                </div>
                   
                <button type="submit" class="btn btn-gradient-primary">Get Company Data</button>
            </form>                                           
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->

    
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">

            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
    


</div>
</div>

@endsection

@push('js')
@include('admin.layout.forms_js')
@endpush