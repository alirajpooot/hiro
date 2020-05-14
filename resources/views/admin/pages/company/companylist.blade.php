@extends('admin.layout.master')
@section('description', 'Welcome to Admin Control Panel')
@section('title', 'Add New Company | Move Klang Admin Panel')
@push('css')
@include('admin.layout.datatable_css')
@endpush
@section('content')
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Datatable</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">All Companies</h4>
                <p class="text-muted mb-3">
                </p>
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Location</th>
                        <th>Category</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($comps as $comp)
                        <tr>
                        <td>{{$comp->company_name}}</td>
                        <td>{{$comp->primary_email}}</td>
                        <td>@foreach(json_decode($comp->locations) as $loc) {{\App\Location::getLocationName($loc)}} , @endforeach</td>
                        <td>@foreach(json_decode($comp->categories) as $cat) {{\App\NewsCategory::getCategoryName($cat)}} , @endforeach</td>
                        <td>{{$comp->primary_phone}}</td>
                        <td><a title="Edit company information" href="{{route('companies.edit',[$comp->id])}}" class="btn btn-primary"><i class="ti-pencil"></i></a> 
                        <a href="{{route('companies.details', [$comp->id])}}" title="Check news and promotion of this company" class="btn btn-info"><i class="ti ti-rss-alt"></i></a>
                            @if($comp->status == 1) <a title="Deactivate the company" href="{{route('companies.deactivate',[$comp->id])}}" class="btn btn-danger btn-small"><i class="ti ti-close"></i></a>@else 
                        <a title="Activate the company" href="{{route('companies.activate',[$comp->id])}}" class="btn btn-primary btn-small"><i class="ti ti-check-box"></i></a> @endif</td>
                        </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                </table>        
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
</div>
@endsection
@push('js')
@include('admin.layout.datatable_js')
@endpush
