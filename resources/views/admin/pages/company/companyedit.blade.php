@extends('admin.layout.master')
@section('description', 'Welcome to Admin Control Panel')
@section('title', 'Add New Company | Move Klang Admin Panel')
@push('css')
@include('admin.layout.forms_css')
@endpush
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            
            <h4 class="page-title">Edit Company</h4>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div>
<div class="container-fluid">
    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Basic Information</h4>
                                    @if(!empty(session('successmsg'))) <div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        {{session('successmsg')}} </div> @endif
                                    <p></p>
                                <form method="post" action="{{route('companies.editpost')}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$data->id}}">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="username">Company Name</label>
                                                    <input type="text" name="companyname" class="form-control" value="{{$data->company_name}}" id="username" required>
                                                    @if(!empty($errors->first('companyname'))) <span class="text-danger">{{$errors->first('companyname')}}</span> @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="useremail">Email address</label>
                                                    <input type="email" name="email" value="{{$data->primary_email}}"  class="form-control" id="useremail" required>
                                                    @if(!empty($errors->first('email'))) <span class="text-danger">{{$errors->first('email')}}</span> @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="subject">Company Address</label>
                                                    <input type="text" name="companyaddress" value="{{$data->company_address}}"  class="form-control" id="subject" required>
                                                    @if(!empty($errors->first('companyaddress'))) <span class="text-danger">{{$errors->first('companyaddress')}}</span> @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="subject">primary Contact #</label>
                                                    <input type="text" name="companycontact" value="{{$data->primary_phone}}"  class="form-control" id="subject" required>
                                                    @if(!empty($errors->first('companycontact'))) <span class="text-danger">{{$errors->first('companycontact')}}</span> @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">                            
                                                <div class="form-group">
                                                    <label for="message">Description</label>
                                                    <textarea class="form-control" name="description" rows="5" id="message">{{$data->description}}</textarea>
                                                    @if(!empty($errors->first('description'))) <span class="text-danger">{{$errors->first('description')}}</span> @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">                            
                                                <div class="form-group">
                                                    <label for="message">Website Links</label>
                                                    <textarea name="weblinks" class="form-control" rows="5" id="message">{{$data->company_links}}</textarea>
                                                    @if(!empty($errors->first('weblinks'))) <span class="text-danger">{{$errors->first('weblinks')}}</span> @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">                            
                                                <div class="form-group">
                                                    <label for="message">Categories</label>
                                                    <select name="categories[]" class="select2 mb-3 select2-multiple" style="width: 100%" multiple="multiple" data-placeholder="Choose" required>
                                                       @forelse($cats as $cat)
                                                    <optgroup label="{{$cat->name}}">
                                                        @forelse($cat->subCats as $n => $subcat)
                                                    <option value="{{$subcat->id}}" @if(\App\StaticFunctions::arrayToID($data->categories,$subcat->id)) selected="selected"@endif>{{$subcat->name}}</option>
                                                        @empty
                                                        @endforelse
                                                        </optgroup> 
                                                        @empty
                                                        @endforelse
                                                    </select> 
                                                    @if(!empty($errors->first('categories'))) <span class="text-danger">{{$errors->first('categories')}}</span> @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">                            
                                                <div class="form-group">
                                                    <label for="message">Locations</label>
                                                    <select name="locations[]" class="select2 mb-3 select2-multiple" style="width: 100%" multiple="multiple" data-placeholder="Choose" required>
                                                       @forelse($locs as $loc)
                                                    <optgroup label="{{$loc->name}}">
                                                        @forelse($loc->subLocs as $k => $subloc)
                                                    <option value="{{$subloc->id}}" @if(\App\StaticFunctions::arrayToID($data->locations,$subloc->id)) selected="selected"@endif>{{$subloc->name}}</option>
                                                        @empty
                                                        @endforelse
                                                        </optgroup> 
                                                        @empty
                                                        @endforelse
                                                    </select> 
                                                    @if(!empty($errors->first('locations'))) <span class="text-danger">{{$errors->first('locations')}}</span> @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="useremail">FB Messenger</label>
                                                    <input type="text" name="messenger" value="{{$data->fbmessenger}}"  class="form-control" id="useremail" required>
                                                    @if(!empty($errors->first('messenger'))) <span class="text-danger">{{$errors->first('messenger')}}</span> @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="useremail">Whatsapp</label>
                                                    <input type="text" name="whatsapp" value="{{$data->whatsapp}}"  class="form-control" id="useremail" required>
                                                    @if(!empty($errors->first('whatsapp'))) <span class="text-danger">{{$errors->first('whatsapp')}}</span> @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">                            
                                                <div class="form-group">
                                                    <div class="custom-file mb-3">
                                                        @isset($data->company_logo)
                                                    <img width="200" src="{{url('public/assets/logos')}}/{{$data->company_logo}}">
                                                        @endisset
                                                        <input type="file" name="companylogo" class="custom-file-input">
                                                        <label class="custom-file-label" for="customFile">Company Logo</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">                            
                                                <div class="form-group">
                                                    <div class="custom-file mb-3">
                                                        <img width="200" src="{{url('public/assets/logos')}}/{{$data->featured_img}}">
                                                        <input name="featuredimage" type="file" class="custom-file-input">
                                                        <label class="custom-file-label" for="customFile">Featured Image</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">                            
                                                <div class="col-md-12">                            
                                                    <div class="form-group">
                                                        <label for="message">Business Types</label>
                                                        <select name="businesstype[]" class="select2 mb-3 select2-multiple" style="width: 100%" multiple="multiple" data-placeholder="Choose" required>
                                                           @forelse($btypes as $btype)
                                                        <option value="{{$btype->id}}" @if(\App\StaticFunctions::arrayToID($data->type,$btype->id)) selected="selected"@endif>{{$btype->name}}</option>
                                                            @empty
                                                            @endforelse
                                                        </select> 
                                                        @if(!empty($errors->first('businesstype'))) <span class="text-danger">{{$errors->first('businesstype')}}</span> @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>Note: All Social Links are optionals you can leave empty<br><br>
                                            <div class="clearfix"></div>
                                        <div class="row">
                                            
                                            <div class="col-md-4">
                                                
                                                <div class="form-group">
                                                    <label for="useremail">Facebook Link</label>
                                                    <input type="text" name="fblink" value="{{$data->facebook}}"  class="form-control" id="useremail" required>
                                                    @if(!empty($errors->first('fblink'))) <span class="text-danger">{{$errors->first('fblink')}}</span> @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="useremail">Twitter</label>
                                                    <input type="text" name="twitter" value="{{$data->twitter}}"  class="form-control" id="useremail" required>
                                                    @if(!empty($errors->first('twitter'))) <span class="text-danger">{{$errors->first('twitter')}}</span> @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="useremail">Instagram</label>
                                                    <input type="text" name="instagram" value="{{$data->instagram}}"  class="form-control" id="useremail" required>
                                                    @if(!empty($errors->first('instagram'))) <span class="text-danger">{{$errors->first('instagram')}}</span> @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="useremail">Youtube</label>
                                                    <input type="text" name="youtube" value="{{$data->youtube}}"  class="form-control" id="useremail" required>
                                                    @if(!empty($errors->first('youtube'))) <span class="text-danger">{{$errors->first('youtube')}}</span> @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="useremail">Linkedin</label>
                                                    <input type="text" name="linkedin" value="{{$data->linkedin}}"  class="form-control" id="useremail" required>
                                                    @if(!empty($errors->first('linkedin'))) <span class="text-danger">{{$errors->first('linkedin')}}</span> @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="useremail">Pintrest</label>
                                                    <input type="text" name="pintrest" value="{{$data->pinterest}}"  class="form-control" id="useremail" required>
                                                    @if(!empty($errors->first('pintrest'))) <span class="text-danger">{{$errors->first('pintrest')}}</span> @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="useremail">Thumbler</label>
                                                    <input type="text" name="thumbler" value="{{$data->thumbler}}"  class="form-control" id="useremail" required>
                                                    @if(!empty($errors->first('thumbler'))) <span class="text-danger">{{$errors->first('thumbler')}}</span> @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="useremail">Google+</label>
                                                    <input type="text" name="googleplus" value="{{$data->googleplus}}"  class="form-control" id="useremail" required>
                                                    @if(!empty($errors->first('googleplus'))) <span class="text-danger">{{$errors->first('googleplus')}}</span> @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 text-center">
                                                <button type="submit" class="btn btn-gradient-primary px-5 py-2">Add Company</button>
                                            </div>
                                        </div>
                                    </form>
                                </div><!--end card-body-->
                            </div><!--end card-->
                    </div> <!-- end row --> 
</div>

@endsection

@push('js')
@include('admin.layout.forms_js')
@endpush