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
            
            <h4 class="page-title">Add New Company</h4>
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
                                <form method="post" action="{{route('companies.addpost')}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="username">Company Name</label>
                                                    <input type="text" name="companyname" class="form-control" value="{{old('companyname')}}" id="username" required>
                                                    @if(!empty($errors->first('companyname'))) <span class="text-danger">{{$errors->first('companyname')}}</span> @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="useremail">Email address</label>
                                                    <input type="email" name="email" value="{{old('email')}}"  class="form-control" id="useremail" required>
                                                    @if(!empty($errors->first('email'))) <span class="text-danger">{{$errors->first('email')}}</span> @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="subject">Company Address</label>
                                                    <input type="text" name="companyaddress" value="{{old('companyaddress')}}"  class="form-control" id="subject" required>
                                                    @if(!empty($errors->first('companyaddress'))) <span class="text-danger">{{$errors->first('companyaddress')}}</span> @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="subject">primary Contact #</label>
                                                    <input type="text" name="companycontact" value="{{old('companycontact')}}"  class="form-control" id="subject" required>
                                                    @if(!empty($errors->first('companycontact'))) <span class="text-danger">{{$errors->first('companycontact')}}</span> @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">                            
                                                <div class="form-group">
                                                    <label for="message">Description</label>
                                                    <textarea class="form-control" name="description" rows="5" id="message">{{old('description')}}</textarea>
                                                    @if(!empty($errors->first('description'))) <span class="text-danger">{{$errors->first('description')}}</span> @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">                            
                                                <div class="form-group">
                                                    <label for="message">Website Links</label>
                                                    <textarea name="weblinks" class="form-control" rows="5" id="message">{{old('weblinks')}}</textarea>
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
                                            <div class="col-md-6">                            
                                                <div class="form-group">
                                                    <label for="message">Locations</label>
                                                    <select name="locations[]" class="select2 mb-3 select2-multiple" style="width: 100%" multiple="multiple" data-placeholder="Choose" required>
                                                       @forelse($locs as $loc)
                                                    <optgroup label="{{$loc->name}}">
                                                        @forelse($loc->subLocs as $subloc)
                                                    <option value="{{$subloc->id}}">{{$subloc->name}}</option>
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
                                                    <label for="useremail">FB Messenger</label>
                                                    <input type="text" name="messenger" value="{{old('messenger')}}"  class="form-control" id="useremail" required>
                                                    @if(!empty($errors->first('messenger'))) <span class="text-danger">{{$errors->first('messenger')}}</span> @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="useremail">Whatsapp</label>
                                                    <input type="text" name="whatsapp" value="{{old('whatsapp')}}"  class="form-control" id="useremail" required>
                                                    @if(!empty($errors->first('whatsapp'))) <span class="text-danger">{{$errors->first('whatsapp')}}</span> @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">                            
                                                <div class="form-group">
                                                    <div class="custom-file mb-3">
                                                        <input type="file" name="companylogo" class="custom-file-input">
                                                        <label class="custom-file-label" for="customFile">Company Logo</label>
                                                        @if(!empty($errors->first('companylogo'))) <span class="text-danger">{{$errors->first('companylogo')}}</span> @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">                            
                                                <div class="form-group">
                                                    <div class="custom-file mb-3">
                                                        <input name="featuredimage" type="file" class="custom-file-input" required>
                                                        <label class="custom-file-label" for="customFile">Featured Image</label>
                                                        @if(!empty($errors->first('featuredimage'))) <span class="text-danger">{{$errors->first('featuredimage')}}</span> @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">                            
                                                <div class="form-group">
                                                    <label for="message">Business Types</label>
                                                    <select name="businesstype[]" class="select2 mb-3 select2-multiple" style="width: 100%" multiple="multiple" data-placeholder="Choose" required>
                                                       @forelse($btypes as $btype)
                                                    <option value="{{$btype->id}}">{{$btype->name}}</option>
                                                        @empty
                                                        @endforelse
                                                    </select> 
                                                    @if(!empty($errors->first('businesstype'))) <span class="text-danger">{{$errors->first('businesstype')}}</span> @endif
                                                </div>
                                            </div>
                                        </div>
                                        <br>Note: All Social Links are optionals you can leave empty<br><br>
                                            <div class="clearfix"></div>
                                        <div class="row">
                                            
                                            <div class="col-md-4">
                                                
                                                <div class="form-group">
                                                    <label for="useremail">Facebook Link</label>
                                                    <input type="text" name="fblink" value="{{old('fblink')}}"  class="form-control" id="useremail" required>
                                                    @if(!empty($errors->first('fblink'))) <span class="text-danger">{{$errors->first('fblink')}}</span> @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="useremail">Twitter</label>
                                                    <input type="text" name="twitter" value="{{old('twitter')}}"  class="form-control" id="useremail" required>
                                                    @if(!empty($errors->first('twitter'))) <span class="text-danger">{{$errors->first('twitter')}}</span> @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="useremail">Instagram</label>
                                                    <input type="text" name="instagram" value="{{old('instagram')}}"  class="form-control" id="useremail" required>
                                                    @if(!empty($errors->first('instagram'))) <span class="text-danger">{{$errors->first('instagram')}}</span> @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="useremail">Youtube</label>
                                                    <input type="text" name="youtube" value="{{old('youtube')}}"  class="form-control" id="useremail" required>
                                                    @if(!empty($errors->first('youtube'))) <span class="text-danger">{{$errors->first('youtube')}}</span> @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="useremail">Linkedin</label>
                                                    <input type="text" name="linkedin" value="{{old('linkedin')}}"  class="form-control" id="useremail" required>
                                                    @if(!empty($errors->first('linkedin'))) <span class="text-danger">{{$errors->first('linkedin')}}</span> @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="useremail">Pintrest</label>
                                                    <input type="text" name="pintrest" value="{{old('pintrest')}}"  class="form-control" id="useremail" required>
                                                    @if(!empty($errors->first('pintrest'))) <span class="text-danger">{{$errors->first('pintrest')}}</span> @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="useremail">Thumbler</label>
                                                    <input type="text" name="thumbler" value="{{old('thumbler')}}"  class="form-control" id="useremail" required>
                                                    @if(!empty($errors->first('thumbler'))) <span class="text-danger">{{$errors->first('thumbler')}}</span> @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="useremail">Google+</label>
                                                    <input type="text" name="googleplus" value="{{old('googleplus')}}"  class="form-control" id="useremail" required>
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